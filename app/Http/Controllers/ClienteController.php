<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller{
    public function index(){
        return view('cliente.index');
    }

    public function listar(Request $request){
        $columns = [
            0 => 'nome',
            1 => 'cpf',
            2 => 'telefone_whatsapp',
            3 => 'telefone_celular',
            4 => 'email',
            5 => 'email_secundario',
            6 => 'situacao',
            7 => 'grupo',
        ];

        $totalData = DB::table('clientes')->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $query = DB::table('clientes');

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%")
                    ->orWhere('cpf', 'LIKE', "%{$search}%")
                    ->orWhere('telefone_whatsapp', 'LIKE', "%{$search}%")
                    ->orWhere('telefone_celular', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('email_secundario', 'LIKE', "%{$search}%")
                    ->orWhere('situacao', 'LIKE', "%{$search}%")
                    ->orWhere('grupo', 'LIKE', "%{$search}%");
            });
            $totalFiltered = $query->count();
        }

        $clientes = $query->orderBy($order, $dir)->offset($start)->limit($limit)->get();

        $data = [];
        foreach ($clientes as $item) {
            $nested = [];

            $nested['cliente'] = "
                                    <div class=\"d-flex flex-column\">
                                        <a href=\"apps/user-management/users/view.html\" class=\"text-gray-800 text-hover-primary mb-1\">$item->nome</a>
                                        <span>$item->cpf</span>
                                    </div>";


            $nested['telefone'] ="
                                    <div class=\"d-flex flex-column\">
                                        $item->telefone_whatsapp
                                    </div>
                                    <div class=\"d-flex flex-column\">
                                        $item->telefone_celular
                                    </div>";
            $nested['email'] = "
                                    <div class=\"d-flex flex-column\">
                                        $item->email
                                    </div>
                                    <div class=\"d-flex flex-column\">
                                        $item->email_secundario
                                    </div>";

            $nested['grupo'] = "<div class=\"badge badge-light-success fw-bold\">Adimplente Premium</div>";

            $data[] = $nested;
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ]);
    }
}
