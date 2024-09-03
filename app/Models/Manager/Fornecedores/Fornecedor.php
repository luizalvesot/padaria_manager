<?php

namespace App\Models\Manager\Fornecedores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "fornecedores";

    protected $fillable = [
        'nome_fornecedor',
        'cnpj_fornecedor',
        'nome_fantasia_fornecedor',
        'status_fornecedor',
        'telefone_celular_fornecedor',
        'telefone_fixo_fornecedor',
        'email_fornecedor',
        'cep_fornecedor',
        'cidade_fornecedor',
        'estado_fornecedor',
        'bairro_fornecedor',
        'logradouro_fornecedor',
        'referencia_fornecedor',
        'numero_fornecedor',
        'observacoes_fornecedor',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
