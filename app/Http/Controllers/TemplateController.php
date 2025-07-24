<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\ContaWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    public function index()
    {
        return view('templates.index');
    }

    public function listarTemplatesMeta($contaId)
    {
        $conta = ContaWhatsapp::findOrFail($contaId);

        if ($conta->tipo_api !== 'meta' || !$conta->token || !$conta->business_account_id) {
            return response()->json([], 400);
        }

        try {
            $resposta = Http::withToken($conta->token)
                ->get("https://graph.facebook.com/v17.0/{$conta->business_account_id}/message_templates");

            return $resposta->json('data') ?? [];
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }

    public function listar(Request $request)
    {
        $columns = [
            0 => 't.id',
            1 => 't.nome',
            2 => 't.tipo',
            3 => 'c.nome',
            4 => 't.namespace',
            5 => 't.template_name',
            6 => 't.componentes',
            7 => 't.mensagem_livre',
        ];

        $query = DB::table('templates as t')
            ->join('contas_whatsapp as c', 't.conta_whatsapp_id', '=', 'c.id')
            ->select([
                't.id',
                't.nome',
                't.tipo',
                'c.nome as conta_whatsapp_nome',
                't.namespace',
                't.template_name',
                't.componentes',
                't.mensagem_livre',
            ]);

        // total
        $totalData = $query->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // busca (se houver)
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('t.nome', 'LIKE', "%{$search}%")
                    ->orWhere('t.template_name', 'LIKE', "%{$search}%");
            });
            $totalFiltered = $query->count();
        }

        $templates = $query->orderBy($order, $dir)->offset($start)->limit($limit)->get();

        $data = [];

        foreach ($templates as $item) {
            $nested = [];
            $nested['id'] = $item->id;
            $nested['conta_whatsapp_nome'] = $item->conta_whatsapp_nome;
            $nested['nome'] = $item->nome;
            $nested['tipo'] = $item->tipo === 'meta' ? '<span class="badge badge-primary">Meta</span>' : '<span class="badge badge-success">Evolution</span>';
            $nested['namespace'] = $item->namespace;
            $nested['template_name'] = $item->template_name;
            $nested['componentes'] = $item->componentes ? json_decode($item->componentes, true) : [];
            $nested['mensagem_livre'] = $item->mensagem_livre;
            $nested['acoes'] = "
                <div class='text-end'>
                    <a href='/templates/{$item->id}/edit' class='btn btn-sm btn-warning me-1'>Editar</a>
                    <button class='btn btn-sm btn-danger btn-excluir' data-id='{$item->id}'>Excluir</button>
                </div>
            ";

            $data[] = $nested;
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $data,
        ]);
    }

    public function create()
    {
        $contas = ContaWhatsapp::all();
        return view('templates.create', compact('contas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'conta_whatsapp_id' => 'required|exists:contas_whatsapp,id',
        ]);

        $conta = ContaWhatsapp::findOrFail($request->conta_whatsapp_id);
        $tipo = $conta->tipo_api;

        $template = new Template();
        $template->nome = $request->nome;
        $template->conta_whatsapp_id = $conta->id;
        $template->tipo = $tipo;

        Log::info($request->all());

        if ($tipo === 'meta') {
            $request->validate([
                'template_meta' => 'required|string',
            ]);

            $template->template_name = $request->template_meta;
            $template->mensagem_livre = null;

            // caso queira salvar o namespace e componentes futuramente, aqui é o lugar:
            // $template->namespace = $request->namespace ?? null;
            // $template->componentes = $request->componentes ?? null;

            $template->save();

            // se houver variáveis (nome_exibicao, campo_origem), salvar
            if ($request->has('variaveis')) {
                foreach ($request->variaveis as $index => $var) {
                    $template->variaveis()->create([
                        'posicao' => $index,
                        'nome_exibicao' => $var['nome_exibicao'] ?? 'Variável ' . ($index + 1),
                        'campo_origem' => $var['campo_origem'] ?? null,
                    ]);
                }
            }
        } elseif ($tipo === 'evolution') {
            $request->validate([
                'mensagem_livre' => 'required|string',
            ]);

            $template->mensagem_livre = $request->mensagem_livre;
            $template->template_name = null;

            $template->save();
            // Evolution não precisa salvar variáveis, pois são livres e substituídas na hora do envio
        }

        return redirect()->route('templates.index')->with('success', 'Template cadastrado com sucesso!');
    }

    public function edit(Template $template)
    {
        $contas = ContaWhatsapp::all();
        $template->load('variaveis');
        return view('templates.edit', compact('template', 'contas'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'conta_whatsapp_id' => 'required|exists:contas_whatsapp,id',
        ]);

        Log::info("UPDATE");
        Log::info($request->all());

        $conta = ContaWhatsapp::findOrFail($request->conta_whatsapp_id);
        $tipo = $conta->tipo_api;

        $template->nome = $request->nome;
        $template->conta_whatsapp_id = $conta->id;
        $template->tipo = $tipo;

        if ($tipo === 'meta') {
            $request->validate([
                'template_meta' => 'required|string',
            ]);

            $template->template_name = $request->template_meta;
            $template->mensagem_livre = null;
        } elseif ($tipo === 'evolution') {
            $request->validate([
                'mensagem_livre' => 'required|string',
            ]);

            $template->mensagem_livre = $request->mensagem_livre;
            $template->template_name = null;
        }

        $template->save();

        if ($tipo === 'meta') {
            $template->variaveis()->delete();
            if ($request->has('variaveis')) {
                foreach ($request->variaveis as $index => $var) {
                    $template->variaveis()->create([
                        'posicao' => $index,
                        'nome_exibicao' => $var['nome_exibicao'] ?? 'Variável ' . ($index + 1),
                        'campo_origem' => $var['campo_origem'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('templates.index')->with('success', 'Template atualizado com sucesso!');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index')->with('success', 'Template removido com sucesso!');
    }
}
