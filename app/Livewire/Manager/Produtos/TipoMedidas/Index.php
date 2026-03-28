<?php

namespace App\Livewire\Manager\Produtos\TipoMedidas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Manager\Produtos\TiposMedidas\TipoMedida;

class Index extends Component
{
    use WithPagination;

    public $descricao_medida = '';
    public $representacao_medida = '';

    public function search_medida()
    {
        $this->resetPage();
    }

    public function render()
    {
        $medidas = TipoMedida::where('descricao_medida', 'like', "%".$this->descricao_medida."%")
                    ->where('representacao_medida', 'like', "%".$this->representacao_medida."%")
                    ->paginate(10);

        return view('livewire.manager.produtos.tipo-medidas.index', compact('medidas'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
