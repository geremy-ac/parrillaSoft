<?php

namespace App\Http\Livewire\Insumos;

use Livewire\Component;

use App\Models\Insumo\Entrada;
use App\Models\Insumo\Insumo;
use Livewire\WithPagination;

class InsumoIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $entradas = Entrada::all();
        $insumos = insumo::where('nombre','LIKE','%'.$this->search.'%')
            ->paginate();//default: 15
        return view('livewire.insumos.insumo-index', compact('insumos','entradas'));
    }
}
