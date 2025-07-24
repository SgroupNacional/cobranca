<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contas_whatsapp', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo_api', ['meta', 'evolution']);
            $table->string('numero')->nullable();

            // API oficial - Meta
            $table->string('business_account_id')->nullable(); // ID da conta comercial
            $table->string('phone_number_id')->nullable();     // ID do número do WhatsApp
            $table->string('token')->nullable();               // token da Meta

            // API não oficial - Evolution
            $table->string('instance_id')->nullable();
            $table->string('apikey')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contas_whatsapp');
    }
};
