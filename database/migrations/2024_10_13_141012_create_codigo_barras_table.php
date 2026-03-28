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
        Schema::create('codigo_barras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->foreignId('produto')
                    ->references('id')
                    ->on('produtos')
                    ->onDelete('restrict');
            $table->dateTime('hora_entrada');
            $table->dateTime('hora_saida');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigo_barras');
    }
};
