<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'=>'Pollos',
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Carnes',
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'salchipas',
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'picadas',
        ]);
    }
}
