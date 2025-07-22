<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\ContaWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::with('contaWhatsapp')->get();
        return view('templates.index', compact('templates'));
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
