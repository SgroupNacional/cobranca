<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Canal;

class CanalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        $canais = [
            ['nome' => 'WhatsApp Oficial', 'tipo' => 'WhatsApp Oficial', 'status' => 'Ativo'],
            ['nome' => 'SMS Informativo', 'tipo' => 'SMS', 'status' => 'Ativo'],
            ['nome' => 'Email Marketing', 'tipo' => 'Email', 'status' => 'Inativo'],
            ['nome' => 'Canal de Voz', 'tipo' => 'Voz', 'status' => 'Ativo']
        ];

        foreach ($canais as $canal) {
            Canal::create($canal);
    }
    
    }
}
