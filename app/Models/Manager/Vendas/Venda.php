<?php

namespace App\Models\Manager\Vendas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;
use App\Models\Manager\Vendas\AuxVenda;

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
        return $this->belongsTo(Cliente::class, 'cliente');
    }

    public function getClienteAttribute()
    {
        return Cliente::where('id', $this->attributes['cliente'])->first();
    }

    public function formasPagamento()
    {
        return $this->belongsTo(FormasPagamento::class, 'forma_pagamento');
    }

    public function getFormaPagamentoAttribute()
    {
        return FormasPagamento::where('id', $this->attributes['forma_pagamento'])->first();
    }

    public function produtos()
    {
        return $this->hasMany(AuxVenda::class, 'venda');
    }
}
