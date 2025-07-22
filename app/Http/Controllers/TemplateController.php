<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\ContaWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::with('contaWhatsapp')->get();
        $contas = ContaWhatsapp::all();
        return view('templates.index', compact('templates', 'contas'));
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

    public function data()
    {
        return DataTables::of(
            Template::with('contaWhatsapp')->select([
                'templates.id',
                'templates.nome',
                'templates.tipo',
                'templates.template_name',
                'templates.mensagem_livre',
                'templates.componentes',
                'templates.conta_whatsapp_id',
            ])
        )
            ->addColumn('conta', function ($tpl) {
                return $tpl->contaWhatsapp->nome ?? '-';
            })
            ->addColumn('acoes', function ($tpl) {
                return '
                <div class="text-end">
                    <button type="button"
                            class="btn btn-sm btn-warning btn-editar me-1"
                            data-bs-toggle="modal"
                            data-bs-target="#kt_modal_editar"
                            data-id="' . $tpl->id . '"
                            data-nome="' . e($tpl->nome) . '"
                            data-tipo="' . $tpl->tipo . '"
                            data-conta="' . $tpl->conta_whatsapp_id . '"
                            data-template_name="' . e($tpl->template_name) . '"
                            data-componentes=\'' . e(json_encode($tpl->componentes)) . '\'
                            data-mensagem_livre="' . e($tpl->mensagem_livre) . '">Editar</button>
                    <button type="button" class="btn btn-sm btn-danger btn-excluir" data-id="' . $tpl->id . '">Excluir</button>
                </div>';
            })
            ->rawColumns(['acoes'])
            ->make(true);
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
                    if (!empty($var['nome_exibicao'])) {
                        $template->variaveis()->create([
                            'posicao' => $index + 1,
                            'nome_exibicao' => $var['nome_exibicao'],
                            'campo_origem' => $var['campo_origem'] ?? null,
                        ]);
                    }
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
        return view('templates.edit', compact('template', 'contas'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:meta,evolution',
            'conta_whatsapp_id' => 'required|exists:contas_whatsapp,id',
        ]);

        $template->update($request->only([
            'nome',
            'tipo',
            'conta_whatsapp_id',
            'namespace',
            'template_name',
            'componentes',
            'mensagem_livre',
        ]));

        return redirect()->route('templates.index')->with('success', 'Template atualizado com sucesso!');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index')->with('success', 'Template removido com sucesso!');
    }
}
