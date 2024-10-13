<?php

namespace App\Models\Manager\Produtos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Manager\Produtos\Produto;

class CodigoBarra extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'codigo_barras';

    protected $fillable = [
        'codigo',
        'produto',
        'hora_entrada',
        'hora_saida',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

    public function getProdutoAttribute()
    {
        return Produto::where('id', $this->attributes['produto'])->first();
    }
}
