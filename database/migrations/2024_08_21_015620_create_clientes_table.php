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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente');
            $table->date('nascimento_cliente');
            $table->string('tipo_cliente', 40)->default('Pessoa física');
            $table->string('cpf_cliente', 14)->nullable();
            $table->string('rg_cliente', 14)->nullable();
            $table->string('cnpj_cliente', 20)->nullable();
            $table->string('nome_fantasia_cliente')->nullable();
            $table->boolean('status_cliente')->default(true);
            $table->string('telefone_celular_cliente', 15);
            $table->string('telefone_fixo_cliente', 15)->nullable();
            $table->string('email_cliente', 100)->nullable();
            $table->string('cep_cliente', 15);
            $table->string('cidade_cliente', 100);
            $table->string('estado_cliente', 5);
            $table->string('bairro_cliente', 100)->nullable();
            $table->string('logradouro_cliente', 100)->nullable();
            $table->string('referencia_cliente', 150)->nullable();
            $table->string('numero_cliente', 10)->nullable();
            $table->string('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
