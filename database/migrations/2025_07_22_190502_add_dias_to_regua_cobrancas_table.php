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
        Schema::table('regua_cobrancas', function (Blueprint $table) {
            $table->integer('dias')->default(0)->after('id'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regua_cobrancas', function (Blueprint $table) {
            $table->dropColumn('dias');
        });
    }
};
