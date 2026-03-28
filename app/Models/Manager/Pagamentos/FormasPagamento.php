<?php

namespace App\Models\Manager\Pagamentos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormasPagamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'formas_pagamentos';

    protected $fillable = [
        'chave_fpagamento',
        'descricao_fpagamento',
        'aceita_parcelamento',
        'parcelas_fpagamento',
        'taxa_fpagamento',
        'juros_fpagamento',
        'created_at',
        'updated_at',
    ];
}
