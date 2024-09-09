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
        Schema::create('tipo_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('chave_medida', 80);
            $table->string('descricao_medida', 100)->nullable();
            $table->string('representacao_medida', 5);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_medidas');
    }
};
