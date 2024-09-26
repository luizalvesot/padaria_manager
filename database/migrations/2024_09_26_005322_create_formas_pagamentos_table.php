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
        Schema::create('formas_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('chave_fpagamento', 15);
            $table->string('descricao_fpagamento', 80);
            $table->boolean('aceita_parcelamento');
            $table->integer('parcelas_fpagamento')->nullable();
            $table->integer('taxa_fpagamento')->nullable();
            $table->integer('juros_fpagamento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_pagamentos');
    }
};
