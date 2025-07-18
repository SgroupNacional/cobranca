<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf', 14)->unique();
            $table->string('telefone_whatsapp', 20)->nullable();
            $table->string('telefone_celular', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('email_secundario')->nullable();
            $table->string('situacao')->nullable();
            $table->char('grupo', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('clientes');
    }
};
