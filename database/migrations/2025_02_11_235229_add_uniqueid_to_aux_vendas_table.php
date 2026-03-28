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
        Schema::table('aux_vendas', function (Blueprint $table) {
            $table->string('uniqueid', 50)->after('tipo_venda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aux_vendas', function (Blueprint $table) {
            $table->dropColumn('uniqueid');
        });
    }
};
