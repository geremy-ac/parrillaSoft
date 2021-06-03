<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosVenta extends Model
{
    use HasFactory;
    protected $table ='productos_venta';
    protected  $guarded = [];
    public function productos()
    {
        return $this->belongsToMany(producto::class, 'productos');
    }
    public function productos_venta()
    {
        return $this->belongsToMany(venta::class, 'ventas');
    }
}
