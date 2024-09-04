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
        Schema::create('forncedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fornecedor');
            $table->string('cnpj_fornecedor', 20)->nullable();
            $table->string('nome_fantasia_fornecedor')->nullable();
            $table->boolean('status_fornecedor')->default(true);
            $table->string('telefone_celular_fornecedor', 15)->nullable();
            $table->string('telefone_fixo_fornecedor', 15);
            $table->string('email_fornecedor', 100)->nullable();
            $table->string('cep_fornecedor', 15)->nullable();
            $table->string('cidade_fornecedor', 100);
            $table->string('estado_fornecedor', 5);
            $table->string('bairro_fornecedor', 100)->nullable();
            $table->string('logradouro_fornecedor', 100)->nullable();
            $table->string('referencia_fornecedor', 150)->nullable();
            $table->string('numero_fornecedor', 10)->nullable();
            $table->string('observacoes_fornecedor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forncedores');
    }
};
