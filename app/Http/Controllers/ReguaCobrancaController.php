<?php

namespace App\Http\Controllers;

use App\Models\ReguaCobranca;
use App\Models\ReguaAcao;
// use App\Models\Template; //  Descomente quando templates estiverem prontos
use Illuminate\Http\Request;

class ReguaCobrancaController extends Controller
{
    public function index()
    {
        $posicoes = ReguaCobranca::with('acoes')->orderBy('dias')->get();
        $acoesDisponiveis = ReguaAcao::select('descricao', 'id')->distinct()->get();

        /*
        // Descomentar quando os templates estiverem disponíveis
        $templates = Template::all();
        return view('regua_cobranca.index', compact('posicoes', 'acoesDisponiveis', 'templates'));
        */

        // Versão atual sem templates
        return view('regua_cobranca.index', compact('posicoes', 'acoesDisponiveis'));
    }

    public function create()
    {
        return view('regua_cobranca.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dias' => 'required|integer',
            //'nome' => 'required|string|max:255', //  Se for usar nome da posição
            // 'template_id' => 'required|exists:templates,id', //  Template ainda não ativo
        ]);

        $novaPosicao = ReguaCobranca::create([
            'dias' => $request->dias,
            //'nome' => $request->nome,
            // 'template_id' => $request->template_id,
            'registro' => $request->has('registro'),
            'pagamento' => $request->has('pagamento'),
            'vencimento' => $request->has('vencimento'),
        ]);

        return redirect()->route('regua-cobranca.index')->with('success', 'Nova posição adicionada.');
    }

    public function edit(ReguaCobranca $regua_cobranca)
    {
        $acoesDisponiveis = ReguaAcao::select('descricao', 'id')->distinct()->get();

        /*
        //  Descomentar quando os templates estiverem prontos
        $templates = Template::all();
        return view('regua_cobranca.edit', compact('regua_cobranca', 'acoesDisponiveis', 'templates'));
        */

        // Versão atual sem templates
        return view('regua_cobranca.edit', compact('regua_cobranca', 'acoesDisponiveis'));
    }

    public function update(Request $request, ReguaCobranca $regua_cobranca)
    {
        $request->validate([
            'dias' => 'required|integer',
            //'nome' => 'required|string|max:255',
            // 'template_id' => 'required|exists:templates,id',
        ]);

        $regua_cobranca->update([
            'dias' => $request->dias,
            //'nome' => $request->nome,
            // 'template_id' => $request->template_id,
            'registro' => $request->has('registro'),
            'pagamento' => $request->has('pagamento'),
            'vencimento' => $request->has('vencimento'),
        ]);

        if ($request->has('acoes')) {
            $regua_cobranca->acoes()->delete();
            foreach ($request->acoes as $acaoId) {
                $acao = ReguaAcao::find($acaoId);
                if ($acao) {
                    $regua_cobranca->acoes()->create([
                        'descricao' => $acao->descricao,
                        'icone' => $acao->icone,
                    ]);
                }
            }
        }

        return redirect()->route('regua-cobranca.index')->with('success', 'Posição atualizada.');
    }

    public function destroy(ReguaCobranca $regua_cobranca)
    {
        $regua_cobranca->delete();
        return redirect()->route('regua-cobranca.index')->with('success', 'Posição removida.');
    }
}
