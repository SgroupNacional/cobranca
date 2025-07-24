<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ImportarClientesJob;

class ImportarClientesCommand extends Command
{
    protected $signature   = 'importar:clientes';
    protected $description = 'Dispara o job que importa TODOS os clientes do SGA';

    public function handle()
    {
        ImportarClientesJob::dispatch();
        $this->info('✅ ImportarClientesJob foi enfileirado.');
    }
}
