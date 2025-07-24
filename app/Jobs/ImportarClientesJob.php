<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\ApiSga;
use App\Helpers\ApiIleva;

class ImportarClientesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Se precisar personalizar fila, timeout etc, ajuste aqui

    public function handle()
    {
        // Chama seu helper que já faz todo o import
        ApiSga::importarAssociados('todos');
        ApiIleva::importarAssociados();
    }
}
