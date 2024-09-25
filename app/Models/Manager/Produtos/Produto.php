<?php

namespace App\Models\Manager\Produtos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Manager\Produtos\Categorias\CategoriaProduto;
use App\Models\Manager\Fornecedores\Fornecedor;
use App\Models\Manager\Produtos\TiposMedidas\TipoMedida;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';

    protected $fillable = [
        'codigo_barras_produto',
        'descricao_produto',
        'categoria_produto',
        'fornecedor',
        'tipo_medida',
        'quantidade_produto',
        'preco_custo_produto',
        'desconto_produto',
        'preco_venda_produto',
        'hora_ultima_entrada',
        'hora_ultima_saida',
        'qtd_ultima_entrada',
        'qtd_ultima_saida',
        'status_produto',
        'observacoes_produto',
        'created_at',
        'updated_at',
    ];

    public function tipo_medidas()
    {
        return $this->belongsTo(TipoMedida::class, 'medida_produto');
    }

    public function categoria_produto()
    {
        return $this->belongsTo(CategoriaProduto::class, 'categoria_produto');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor');
    }

    public function getCategoriaProdutoAttribute()
    {
        return CategoriaProduto::where('id', $this->attributes['categoria_produto'])->first();
    }

    public function getFornecedorAttribute()
    {
        return Fornecedor::where('id', $this->attributes['fornecedor'])->first();
    }

    public function getTipoMedidaAttribute()
    {
        return TipoMedida::where('id', $this->attributes['tipo_medida'])->first();
    }
}
