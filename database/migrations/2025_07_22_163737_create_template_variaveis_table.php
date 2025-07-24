<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('template_variaveis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('template_id')
                ->constrained('templates')
                ->onDelete('cascade');

            $table->unsignedInteger('posicao'); // exemplo: 1, 2, 3

            $table->string('nome_exibicao'); // exemplo: Nome, Valor, Link do Boleto
            $table->string('campo_origem')->nullable(); // exemplo: associados.nome, boletos.valor

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_variaveis');
    }
};
