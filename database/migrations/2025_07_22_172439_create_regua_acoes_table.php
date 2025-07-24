<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('regua_acoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regua_cobranca_id')->constrained('regua_cobrancas')->onDelete('cascade');
            $table->string('descricao');
            $table->string('icone')->nullable(); // para mostrar o ícone ao lado (ex: globe, mobile)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regua_acoes');
    }
};
