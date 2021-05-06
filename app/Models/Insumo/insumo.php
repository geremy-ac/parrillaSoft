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

public function entrada(){
    return $this->belongsTo(Entrada::class,'idInsumo','id');
}
}
