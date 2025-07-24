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
        Schema::create('regua_cobrancas', function (Blueprint $table) {
            $table->id();
            $table->integer('dias'); // negativo = antes do vencimento, 0 = no dia, positivo = após
            $table->boolean('registro')->default(false);
            $table->boolean('pagamento')->default(false);
            $table->boolean('vencimento')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regua_cobrancas');
    }
};
