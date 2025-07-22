<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class SgaApi{
    public static function fetchBoletos(int $offset = 0, int $limit = 5000): array
    {
        $response = Http::withToken(config('services.sga.token'))
            ->get(config('services.sga.url').'/boletos', [
                'inicio_paginacao' => $offset,
                'max'               => $limit,
            ])->throw();

        return $response->json()['data'] ?? [];
    }
}
