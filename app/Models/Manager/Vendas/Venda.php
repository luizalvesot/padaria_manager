<?php

namespace App\Models\Manager\Vendas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;

class Venda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendas';

    protected $fillable = [
        'descricao_venda',
        'cliente', // chave estrangeira
        'horario_abertura',
        'prazo_encerramento',
        'horario_encerramento',
        'valor_total_venda',
        'forma_pagamento', // chave estrangeira
        'status_pagamento_venda',
        'valor_receber',
        'valor_recebido',
        'valor_troco',
        'tipo_venda',
        'observacoes_venda',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function formasPagamento()
    {
        return $this->belongsTo(FormasPagamento::class);
    }

    public function produtos()
    {
        return $this->hasMany(VendaProduto::class);
    }
}
