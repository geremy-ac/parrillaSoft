<?php

namespace App\Models;

use App\Models\Insumo\Insumo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoInsumo extends Model
{
    use HasFactory;
    protected $table ='insumo_productos';
    protected  $guarded = [];
    public function categoriaProducto()
    {
        return $this->belongsTo(categoria::class, 'idCategorias', 'id');
    }

    public function insumos()
    {
        return $this->belongsToMany(insumo::class, 'insumo_productos');
    }


}
