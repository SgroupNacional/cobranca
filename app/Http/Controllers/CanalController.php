<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canal;
use Yajra\DataTables\Facades\DataTables;

class CanalController extends Controller
{
    public function index(){
        return view('canais.index');
    }

        public function data()
        {
            return DataTables::of(
                Canal::select(['id', 'nome', 'tipo', 'status'])
            )
            ->addColumn('acoes', function ($canal) {
                return '
                    <div class="text-center">
                        <button type="button" 
                            class="btn btn-sm btn-primary btn-editar me-1" 
                            data-bs-toggle="modal" 
                            data-bs-target="#kt_modal_editar"
                            data-id="' . $canal->id . '"
                            data-nome="' . $canal->nome . '"
                            data-tipo="' . $canal->tipo . '"
                            data-token="' . $canal->token . '"
                            data-url="' . $canal->url . '"
                            data-status="' . $canal->status . '"
                        >
                            Editar
                        </button>

                        <button type="button" 
                            class="btn btn-sm btn-danger btn-excluir" 
                            data-id="' . $canal->id . '">
                            <i class="ki-duotone ki-trash fs-2"></i> Excluir
                        </button>
                    </div>
                ';
            })
            ->rawColumns(['acoes'])
            ->make(true);
        }

    public function store(Request $request){
        $request->validate([
            'canal' => 'required|in:Whatsapp Oficial, Whatsapp Não Oficial,Email, SMS, Voz',
        ]);
        return redirect()->route('canais.select')->with('success', 'Canal selecionado: ' . $request->canal);
    }
    
    
    public function edit($id){
        $canal = Canal::findOrFail($id);
        return response()->json($canal);
    }


    public function update(Request $request){
        $canal = Canal::findOrFail($request->id);

        $canal->update([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'token' => $request->token,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('canais.index')->with('success', 'Canal atualizado com sucesso!');
    }
   
    public function destroy($id)
        {
            $canal = Canal::findOrFail($id);
            $canal->delete();

            return response()->json(['success' => true, 'message' => 'Canal excluído com sucesso.']);
        }


}
