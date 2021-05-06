<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Geremy Arango',
            'email'=> 'geremy1100@hotmail.com',
            'password' => bcrypt('123456')
        ])->assignRole('Administrador');

        User::create([
            'name'=>'Alejandro Perez',
            'email'=> 'lejandro@hotmail.com',
            'password' => bcrypt('123456')
        ])->assignRole('Mesero');


        User::factory(20)->create();
    }
}
