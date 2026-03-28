<?php

namespace App\Livewire\Manager\Vendas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Manager\Vendas\Venda;
use Carbon\Carbon;

class Listagem extends Component
{
    use WithPagination;

    public $id_venda;
    public $nome_cliente;
    public $status_venda = '';
    public $horario_inicial_venda;
    public $horario_final_venda;
   
    public function render()
    {
        $query = Venda::query();

        if($this->id_venda){
            $query->find($this->id_venda);
        }

        $query->whereHas('cliente', function ($query) {
            $query->where('nome_cliente', 'like', '%'.$this->nome_cliente.'%');
        });

        if ($this->horario_inicial_venda && $this->horario_final_venda) {
            // Verifica se as datas inicial e final são iguais
            if ($this->horario_inicial_venda === $this->horario_final_venda) {
                $query->whereDate('horario_abertura', $this->horario_inicial_venda); // Busca apenas pela data
            } else {
                $query->whereBetween('horario_abertura', [$this->horario_inicial_venda, $this->horario_final_venda]);
            }
        } elseif ($this->horario_inicial_venda) {
            $query->where('horario_abertura', '>=', $this->horario_inicial_venda);
        } elseif ($this->horario_final_venda) {
            $query->where('horario_abertura', '<=', $this->horario_final_venda);
        }
        

        if($this->status_venda){
            if($this->status_venda !== ''){
                $query->where('status_pagamento_venda', $this->status_venda);
            }
        }

        $vendas = $query->paginate(15);

        return view('livewire.manager.vendas.listagem', compact('vendas'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
