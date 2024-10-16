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
        Schema::create('aux_vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda')
                    ->references('id')
                    ->on('vendas')
                    ->onDelete('restrict');
            $table->foreignId('produto')
                    ->references('id')
                    ->on('produtos')
                    ->onDelete('restrict');
            $table->foreignId('cliente')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('restrict');
            $table->integer('qtd_produto');
            $table->decimal('preco', 10, 2);
            $table->dateTime('horario_venda');
            $table->string('tipo_venda', 30);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_vendas');
    }
};
