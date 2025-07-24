<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('conta_whatsapp_id')->constrained('contas_whatsapp')->onDelete('cascade');

            $table->string('nome'); // nome interno
            $table->enum('tipo', ['meta', 'evolution']);

            // Meta
            $table->string('namespace')->nullable(); // namespace Meta (ex: business ID)
            $table->string('template_name')->nullable(); // nome real do template na Meta
            $table->json('componentes')->nullable(); // corpo estruturado vindo da Meta

            // Evolution
            $table->text('mensagem_livre')->nullable(); // corpo livre com variáveis

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
