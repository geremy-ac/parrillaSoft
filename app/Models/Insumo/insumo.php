<?php

namespace App\Models\Insumo;

use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table ='insumo';
    protected  $guarded = [];
    protected $fillable = ['nombre','estatus','medida','stock_minimo','cantidad'];

public function entrada(){
    return $this->belongsTo(Entrada::class,'idInsumo','id');
}

    public function productos()
    {
        return $this->belongsToMany(producto::class);
    }
}
