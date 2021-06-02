<?php

namespace App\Models\Insumo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table ='insumo';
    protected  $guarded = [];
    protected $fillable = ['nombre','estatus','medida','stock_minimo','cantidad'];

}
