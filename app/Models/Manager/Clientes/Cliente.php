<?php

namespace App\Models\Manager\Clientes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "clientes";

    protected $fillable = [
        'nome_cliente',
        'nascimento_cliente',
        'tipo_cliente',
        'cpf_cliente',
        'rg_cliente',
        'cnpj_cliente',
        'nome_fantasia_cliente',
        'status_cliente',
        'telefone_celular_cliente',
        'telefone_fixo_cliente',
        'email_cliente',
        'cep_cliente',
        'cidade_cliente',
        'estado_cliente',
        'bairro_cliente',
        'logradouro_cliente',
        'referencia_cliente',
        'numero_cliente',
        'observacoes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
