<?php

namespace Database\Seeders;

use App\Models\categoria;
use App\Models\producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Insumo\Entrada;
use App\Models\Insumo\Insumo;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Insumo::truncate();
        Entrada::truncate();
        categoria::truncate();
        producto::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);

    }
}
