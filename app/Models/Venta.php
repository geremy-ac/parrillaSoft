<?php

namespace App\Models;
use App\Models\producto;
use App\Models\ProductosVenta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Venta extends Model
{
    use HasFactory;
    protected $table ='ventas';
    protected  $guarded = [];
    public function productos()
    {
        return $this->belongsToMany(ProductosVenta::class, 'productos_venta')>withTimestamps();
    }
}
