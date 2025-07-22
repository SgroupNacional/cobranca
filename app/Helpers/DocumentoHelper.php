<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DocumentoHelper
{
    /**
     * Formata um número de documento (CPF ou CNPJ).
     *
     * @param string|null $documento
     * @return string
     */
    public static function formatar($documento){
        if (is_null($documento)) {
            return '';
        }

        // Remove tudo que não for número
        $documento = preg_replace('/[^0-9]/', '', $documento);

        // CPF: 11 dígitos
        if (strlen($documento) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $documento);
        }

        // CNPJ: 14 dígitos
        if (strlen($documento) === 14) {
            return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "$1.$2.$3/$4-$5", $documento);
        }

        // Retorna sem formatação se for inválido
        return $documento;
    }

    public static function cleanCpf($cpf){
        if (is_null($cpf)) {
            return null;
        }

        // Remove tudo que não for dígito
        $cleaned = preg_replace('/[^0-9]/', '', $cpf);

        // Retorna null se, após a limpeza, a string estiver vazia
        return empty($cleaned) ? null : $cleaned;
    }

    public static function formatDate($raw){
        if (
            empty($raw)
            || in_array($raw, ['0000-00-00', '0000-00-00T00:00:00-0300', '?'], true)
        ) {
            return null;
        }

        try {
            return Carbon::parse($raw)->format('Y-m-d');
        } catch (\Exception $e) {
            Log::warning('⚠️ Data inválida ignorada: ' . $raw);
            return null;
        }
    }
}
