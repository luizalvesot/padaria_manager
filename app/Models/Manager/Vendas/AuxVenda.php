<?php

namespace App\Models\Manager\Vendas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Produtos\Produto;
use App\Models\Manager\Vendas\Venda;

class AuxVenda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aux_vendas';

    protected $fillable = [
        'venda_id', // chave estrangeira
        'produto_id', // chave estrangeira
        'cliente_id', // chave estrangeira
        'qtd_produto',
        'preco',
        'horario_venda',
        'tipo_venda',
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda_id');
    }

    /*public function getVendaAttribute()
    {
        return Venda::where('id', $this->attributes['venda'])->first();
    }*/

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    /*public function getProdutoAttribute()
    {
        return Produto::where('id', $this->attributes['produto'])->first();
    }*/

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
