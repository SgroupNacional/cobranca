<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReguaCobranca;
use App\Models\ReguaAcao;


class ReguaSeeder extends Seeder
{
    public function run(): void
    {
        $posicoes = [-5, -4, -3, -2, -1, 0, 1, 3, 5, 7, 9, 10, 15, 20];

        foreach ($posicoes as $dias) {
            $posicao = ReguaCobranca::create([
                'dias' => $dias,
                'registro' => false,
                'pagamento' => false,
                'vencimento' => $dias === 0, // só marca true quando for exatamente no vencimento
            ]);

            // Ação 1: Webhook
            ReguaAcao::create([
                'regua_cobranca_id' => $posicao->id,
                'descricao' => "Webhook - Lembrete {$dias} dia(s)",
                'icone' => 'fas fa-globe'
            ]);

            // Ação 2: Pushnotification
            ReguaAcao::create([
                'regua_cobranca_id' => $posicao->id,
                'descricao' => "Pushnotification - Faltam {$dias} dia(s)",
                'icone' => 'fas fa-mobile'
            ]);
        }
    }
}