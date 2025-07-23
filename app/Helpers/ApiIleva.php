<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ApiIleva {
    // URL base da API ILeva
    private const BASE_URL = 'https://api-integracao.ileva.com.br';

    // Token de acesso fornecido pela ILeva
    private const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJoYXNoIjoiMGExZTIwYWJiZjIxIiwiaWRfYWRtX2NsaWVudGUiOjIzOH0.ihljlefTPjEjF-1r26-e5jpp4mzu4UZp9SQq7o0wQng';

    // Quantidade máxima permitida por página (conforme doc: máximo 600)
    private const PER_PAGE = 600;

    /**
     * Faz paginação chamada a /associado/listar e retorna todos os associados.
     *
     * @param  int|null  $codSituacao  código da situação (opcional)
     * @param  int|null  $codConta     código da conta (opcional)
     * @return array                   lista completa de associados
     */
    public static function importarAssociados(): void{
        ini_set('memory_limit', '512M');
        set_time_limit(0);
        DB::disableQueryLog();

        $offset           = 0;
        $totalEncontrados = null;

        do {
            // Monta parâmetros de query
            $query = [
                'inicio_paginacao'      => $offset,
                'quantidade_por_pagina' => self::PER_PAGE,
            ];

            // Chama a API
            $response = Http::timeout(300)
                ->withHeaders([
                    'access_token' => self::TOKEN,
                    'Accept' => 'application/json',
                ])
                ->get(self::BASE_URL . '/associado/listar', $query);

            if (! $response->successful()) {
                Log::error('❌ Erro na API ILeva: ' . $response->body());
                break;
            }

            $data = $response->json();

            // Registra total na primeira página
            if (is_null($totalEncontrados)) {
                $totalEncontrados = (int) ($data['total_encontrados'] ?? 0);
                Log::info("📊 ILeva: total previsto de {$totalEncontrados} associados.");
            }

            $associados = $data['associados'] ?? [];
            $count      = count($associados);
            Log::info("📦 ILeva: página com {$count} registros (offset={$offset}).");

            // Prepara lote de upsert
            $lote = [];
            foreach ($associados as $assoc) {
                // limpa CPF e valida
                $cpfLimpo = DocumentoHelper::cleanCpf($assoc['cpf'] ?? null);
                if (! $cpfLimpo) {
                    Log::warning('⚠️ ILeva: CPF inválido, pulando: ' . json_encode($assoc));
                    continue;
                }

                $lote[] = [
                    'nome'               => $assoc['nome']              ?? null,
                    'cpf'                => $cpfLimpo,
                    'telefone_whatsapp'  => isset($assoc['telefone_whatsapp'])
                        ? preg_replace('/\D+/', '', $assoc['telefone_whatsapp'])
                        : null,
                    'telefone_celular'   => isset($assoc['telefone_comercial'])
                        ? preg_replace('/\D+/', '', $assoc['telefone_comercial'])
                        : null,
                    'email'              => $assoc['email']             ?? null,
                    'email_secundario'   => $assoc['email_secundario']   ?? null,
                    'situacao'           => $assoc['situacao']          ?? null,
                    'grupo'              => $assoc['cod_conta']         ?? null,
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

            // grava o lote restante
            if (! empty($lote)) {
                DB::table('clientes')
                    ->upsert(
                        $lote,
                        ['cpf'],
                        ['nome','telefone_whatsapp','telefone_celular','email','email_secundario','situacao','grupo','updated_at']
                    );
            }

            // limpa variáveis e avança offset
            unset($data, $associados, $lote, $response);
            gc_collect_cycles();
            $offset += $count;

        } while ($offset < $totalEncontrados);

        Log::info('✅ ILeva: importação de associados concluída.');
    }
}
