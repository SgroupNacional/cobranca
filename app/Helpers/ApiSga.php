<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ApiSga{
    // ——————————————————————————————————————————————
    // CONFIGURAÇÃO “hard-coded” no Helper
    // ——————————————————————————————————————————————
    protected const BASE_URL         = 'https://api.hinova.com.br/api/sga/v2'; // ajuste para sua URL real
    protected const PERMANENT_TOKEN  = 'ad6984961d920fd3b6007e7453171e662472be16af27e769897ffd13786516fee2aad5df4ca1448dbb13bd69d62f1eab4e4c48b1072bcc9ff3403b00de3083cbf2eb956f73bb3054e7556a6dfe617faf';
    protected const USER             = 'shield';
    protected const PASS             = 'Shield#738';
    protected const CACHE_KEY        = 'sga:token_usuario';
    protected const SITUACOES_SGA = [
        1,  2,  3,  4,  5,  6,  7,
        8,  9, 10, 11, 12, 13, 14,
        15, 16, 17, 18, 19, 20, 21,
        22, 23, 24, 29, 30, 39, 41,
        42, 43, 44,
    ];

    /**
     * Retorna um token válido; se não existir em cache, faz login e guarda.
     */
    public static function getToken(): string
    {
        // Se já tivermos no cache, devolve imediatamente
        if (Cache::has(self::CACHE_KEY)) {
            return Cache::get(self::CACHE_KEY);
        }

        // Caso contrário, autentica na API para gerar um novo token
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.self::PERMANENT_TOKEN, // Usa o token permanente para autenticar
            'Content-Type' => 'application/json'
        ])
            ->timeout(60)          // tempo total de resposta em segundos
            ->connectTimeout(30)   // tempo para “resolver DNS + abrir conexão” em segundos
            ->post(self::BASE_URL."/usuario/autenticar", [
                'usuario' => self::USER,
                'senha' => self::PASS,
            ]);



        // log do status e body para debug
        Log::info('[SGA Auth] status '.$response->status());
        Log::debug('[SGA Auth] body '.json_encode($response->json()));

        $body = $response->json();

        if (empty($body['token_usuario']) || ! Str::of($body['token_usuario'])->length()) {
            throw new \RuntimeException('Não foi possível obter token temporário do SGA.');
        }

        // Armazena em cache para uso futuro.
        // Observação: pela documentação esse token não expira, então usamos rememberForever.
        Cache::forever(self::CACHE_KEY, $body['token_usuario']);

        return $body['token_usuario'];
    }

    /**
     * (Opcional) Força a limpeza do token em cache,
     * assim no próximo getToken() ele vai gerar um novo.
     */
    public static function invalidateToken(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Exemplo de chamada protegida usando o token.
     */
    public static function fetchBoletos(int $offset = 0, int $limit = 5000): array
    {
        $token = self::getToken();

        $response = Http::withToken($token)
            ->get(self::BASE_URL.'/boletos', [
                'inicio_paginacao' => $offset,
                'max'              => $limit,
            ])->throw();

        return $response->json()['data'] ?? [];
    }

    public static function importarAssociados($situacao = 'todos'): void{
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        DB::disableQueryLog();

        $situacoes = $situacao === 'todos'
            ? self::SITUACOES_SGA
            : [(int) $situacao];

        foreach ($situacoes as $codigoSituacao) {
            Log::info("🚀 Iniciando importação da situação {$codigoSituacao} às " . now());

            $token        = self::getToken();
            $perPage      = 5000;
            $offset       = 0;
            $totalRecords = null;
            $acumulado    = 0;

            do {
                gc_collect_cycles();

                $response = Http::timeout(300)
                    ->withToken($token)
                    ->withHeaders(['Accept' => 'application/json'])
                    ->post(self::BASE_URL . '/listar/associado', [
                        'codigo_situacao'       => $codigoSituacao,
                        'inicio_paginacao'      => $offset,
                        'quantidade_por_pagina' => $perPage,
                    ]);

                if ($response->status() === 401) {
                    Log::warning("🔐 Token expirado, renovando...");
                    self::invalidateToken();
                    $token = self::getToken();
                    continue;
                }

                if (! $response->successful()) {
                    Log::error("❌ Erro na API SGA: " . $response->body());
                    break;
                }

                $data = $response->json();
                if (is_null($totalRecords)) {
                    $totalRecords = (int) ($data['total_associados'] ?? 0);
                    Log::info("📊 Situação {$codigoSituacao}: total previsto de {$totalRecords} registros.");
                }

                $associados = $data['associados'] ?? [];
                $count      = count($associados);
                $acumulado += $count;
                Log::info("📦 Página com {$count} registros recebida (acumulado: {$acumulado})");

                // --- MONTA O LOTE PARA A TABELA clientes ---
                $lote = [];
                foreach ($associados as $assoc) {
                    $cpfLimpo = DocumentoHelper::cleanCpf($assoc['cpf'] ?? null);
                    if (! $cpfLimpo) {
                        Log::warning("⚠️ CPF inválido, pulando: " . json_encode($assoc));
                        continue;
                    }

                    // Monta o array com as colunas exatas da sua tabela `clientes`
                    $lote[] = [
                        'nome'               => $assoc['nome']               ?? null,
                        'cpf'                => $cpfLimpo,
                        'telefone_whatsapp'  => isset($assoc['ddd_celular'], $assoc['telefone_celular'])
                            ? preg_replace('/\D+/', '', $assoc['ddd_celular'] . $assoc['telefone_celular'])
                            : null,
                        'telefone_celular'   => isset($assoc['ddd_celular_aux'], $assoc['telefone_celular_aux'])
                            ? preg_replace('/\D+/', '', $assoc['ddd_celular_aux'] . $assoc['telefone_celular_aux'])
                            : null,
                        'email'              => $assoc['email']             ?? null,
                        'email_secundario'   => $assoc['email_auxiliar']     ?? null,
                        'situacao'           => "Adimplente",
                        'grupo'              => "1",
                        'created_at'         => now(),
                        'updated_at'         => now(),
                    ];

                    // dispara o upsert a cada 500 registros
                    if (count($lote) >= 500) {
                        DB::table('clientes')
                            ->upsert(
                                $lote,
                                ['cpf'],
                                ['nome','telefone_whatsapp','telefone_celular','email','email_secundario','situacao','grupo','updated_at']
                            );
                        $lote = [];
                        gc_collect_cycles();
                    }
                }

                // grava o último lote
                if ($lote) {
                    DB::table('clientes')
                        ->upsert(
                            $lote,
                            ['cpf'],
                            ['nome','telefone_whatsapp','telefone_celular','email','email_secundario','situacao','grupo','updated_at']
                        );
                }

                unset($data, $associados, $response);
                gc_collect_cycles();

                $offset += $perPage;
            } while ($offset < $totalRecords);

            Log::info("✅ Finalizada importação da situação {$codigoSituacao} às " . now());
        }

        Log::info('🔄 Importação SGA concluída para todas as situações.');
    }

}
