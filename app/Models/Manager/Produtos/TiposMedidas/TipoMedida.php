<?php

namespace App\Models\Manager\Produtos\TiposMedidas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMedida extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_medidas';

    protected $fillable = [
        'chave_medida',
        'descricao_medida',
        'representacao_medida',
        'created_at',
        'updated_at',
    ];
}
