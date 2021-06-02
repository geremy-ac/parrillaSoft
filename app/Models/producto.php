<?php

namespace App\Models;

use App\Models\Insumo\Insumo;
use App\Models\Insumo\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table ='productos';
    protected  $guarded = [];
    public function categoriaProducto()
    {
        return $this->belongsTo(categoria::class, 'idCategorias', 'id');
    }

    public function insumos()
    {
        return $this->belongsToMany(insumo::class, 'insumo_productos');
    }
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'productos_venta')->withTimestamps();
    }



}
