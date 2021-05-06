<?php

namespace App\Models\Insumo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table ='entrada';
    protected $fillable = ['cantidad','lote','caducidad','idInsumo'];

    public function insumos(){
        return $this->hasMany(Insumo::class );
    }

}
