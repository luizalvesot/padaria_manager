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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao_venda', 100);
            $table->foreignId('cliente')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('restrict');
            $table->dateTime('horario_abertura');
            $table->dateTime('prazo_encerramento')->nullable();
            $table->dateTime('horario_encerramento')->nullable();
            $table->decimal('valor_total_venda');
            $table->foreignId('forma_pagamento')
                    ->references('id')
                    ->on('formas_pagamentos')
                    ->onDelete('restrict');
            $table->string('status_pagamento_venda', 30)->nullable();
            $table->decimal('valor_receber')->nullable();
            $table->decimal('valor_recebido')->nullable();
            $table->string('tipo_venda', 30);
            $table->string('observacoes_venda')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
