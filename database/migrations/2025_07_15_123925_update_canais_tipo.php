<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::create('canals', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', [
                'WhatsApp Oficial',
                'WhatsApp Não Oficial',
                'Email',
                'SMS',
                'Voz'
            ]);
            $table->unsignedInteger('inscritos')->default(0);
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('canals');
    }
};

