<?php

namespace App\Http\Controllers;

use App\Models\ContaWhatsapp;
use Illuminate\Http\Request;

class ContaWhatsappController extends Controller
{
    public function index()
    {
        $contas = ContaWhatsapp::all();
        return view('whatsapp.index', compact('contas'));
    }

    public function listar(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'nome',
            2 => 'tipo_api',
            3 => 'numero',
            4 => 'business_account_id',
            5 => 'phone_number_id',
            6 => 'instance_id',
        ];

        $totalData = ContaWhatsapp::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $columns[$request->input('order.0.column')];
        $orderDir = $request->input('order.0.dir');

        $query = ContaWhatsapp::select(
            'id',
            'nome',
            'tipo_api',
            'numero',
            'business_account_id',
            'phone_number_id',
            'instance_id'
        );

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%")
                    ->orWhere('numero', 'like', "%{$search}%")
                    ->orWhere('tipo_api', 'like', "%{$search}%")
                    ->orWhere('business_account_id', 'like', "%{$search}%")
                    ->orWhere('phone_number_id', 'like', "%{$search}%")
                    ->orWhere('instance_id', 'like', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        $contas = $query
            ->offset($start)
            ->limit($limit)
            ->orderBy($orderColumn, $orderDir)
            ->get();

        $data = [];

        foreach ($contas as $item) {
            $nested = [];

            $nested['id'] = $item->id;
            $nested['nome'] = $item->nome;
            $nested['tipo_api'] = strtoupper($item->tipo_api);
            $nested['numero'] = $item->numero ?? '-';
            $nested['business_account_id'] = $item->business_account_id ?? '-';
            $nested['phone_number_id'] = $item->phone_number_id ?? '-';
            $nested['instance_id'] = $item->instance_id ?? '-';

            $nested['acoes'] = "
            <div class='text-end'>
                <a href='" . route('whatsapp.edit', $item->id) . "' class='btn btn-sm btn-warning me-1'>Editar</a>
                <button class='btn btn-sm btn-danger btn-excluir' data-id='{$item->id}'>Excluir</button>
            </div>
        ";

            $data[] = $nested;
        }

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data,
        ]);
    }


    public function create()
    {
        return view('whatsapp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_api' => 'required|in:meta,evolution',
        ]);

        ContaWhatsapp::create($request->all());

        return redirect()->route('whatsapp.index')->with('success', 'Conta de WhatsApp cadastrada com sucesso!');
    }

    public function edit(ContaWhatsapp $whatsapp)
    {
        return view('whatsapp.edit', compact('whatsapp'));
    }

    public function update(Request $request, ContaWhatsapp $whatsapp)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_api' => 'required|in:meta,evolution',
        ]);

        $whatsapp->update($request->all());

        return redirect()->route('whatsapp.index')->with('success', 'Conta atualizada com sucesso!');
    }

    public function destroy(ContaWhatsapp $whatsapp)
    {
        $whatsapp->delete();

        return redirect()->route('whatsapp.index')->with('success', 'Conta removida com sucesso!');
    }
}
