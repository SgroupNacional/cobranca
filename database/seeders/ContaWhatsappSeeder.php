<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContaWhatsappSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contas_whatsapp')->insert([
            'id' => 1,
            'nome' => 'Disparador',
            'tipo_api' => 'meta',
            'numero' => env('META_WA_PHONE_NUMBER'),
            'business_account_id' => env('META_WA_BUSINESS_ID'),
            'phone_number_id' => env('META_WA_PHONE_NUMBER_ID'),
            'token' => env('META_WA_TOKEN'),
            'instance_id' => '',
            'apikey' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}