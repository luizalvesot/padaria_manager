<?php

namespace App\Models\Manager\Produtos\Categorias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProduto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categoria_produtos';

    protected $fillable = [
        'chave_categoria',
        'nome_categoria',
        'descricao_categoria',
        'created_at',
        'updated_at',
    ];
}
