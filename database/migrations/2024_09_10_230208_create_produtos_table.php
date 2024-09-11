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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_barras_produto', 80)->nullable();
            $table->string('descricao_produto');
            $table->foreignId('categoria_produto')
                    ->references('id')
                    ->on('categoria_produtos')
                    ->onDelete('restrict');
            $table->foreignId('fornecedor_produto')
                    ->references('id')
                    ->on('forncedores')
                    ->onDelete('restrict');
            $table->foreignId('medida_produto')
                    ->references('id')
                    ->on('tipo_medidas')
                    ->onDelete('restrict');
            $table->double('quantidade_produto')->nullable();
            $table->double('preco_custo_produto');
            $table->integer('desconto_produto')->nullable();
            $table->double('preco_venda_produto');
            $table->dateTime('hora_ultima_entrada')->nullable();
            $table->dateTime('hora_ultima_saida')->nullable();
            $table->double('qtd_ultima_entrada')->nullable();
            $table->double('qtd_ultima_saida')->nullable();
            $table->string('observacoes_produto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
