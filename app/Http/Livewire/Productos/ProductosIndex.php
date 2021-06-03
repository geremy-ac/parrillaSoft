<?php

namespace App\Http\Livewire\Productos;
namespace App\Http\Controllers;

use App\Models\Insumo\Insumo;
use App\Models\producto;
use Livewire\Component;
use Livewire\WithPagination;
use Iluminate\Http\Request;
class ProductosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render(Request $request)
    {
        $id = $request->input('id');
        $insumos=[];
        if($id !=null){
            $insumos=insumo::select("insumo.*")->join("insumo_productos","Insumo.id","=","insumo_productos.Insumo_id")
                ->get();
        }
        $producto = producto::where('nombre','LIKE','%'.$this->search.'%')
            ->paginate();//default: 15
        return view('livewire.productos.productos-index', compact('producto',"insumos"));
    }
}
