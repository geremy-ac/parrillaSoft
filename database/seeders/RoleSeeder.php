<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Mesero']);
        $role3 = Role::create(['name' => 'Cajero']);

        Permission::create(['name' =>'users.index'])->syncRoles([$role1]);
        Permission::create(['name' =>'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' =>'users.update'])->syncRoles([$role1]);

        Permission::create(['name' =>'listarInsumo'])->syncRoles([$role1,$role2 ,$role3]);
        Permission::create(['name' =>'FormularioEntrada'])->syncRoles([$role1]);
        Permission::create(['name' =>'showInsumo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' =>'insumoCrear'])->syncRoles([$role1]);
        Permission::create(['name' =>'CrearInsumo'])->syncRoles([$role1]);
        Permission::create(['name' =>'CrearEntrada'])->syncRoles([$role1]);
        Permission::create(['name' =>'insumoEliminar'])->syncRoles([$role1]);
        Permission::create(['name' =>'CestadoI'])->syncRoles([$role1]);
        Permission::create(['name' =>'descargarPDFInsumos'])->syncRoles([$role1]);

        Permission::create(['name' =>'ListarProducto'])->syncRoles([$role1,$role2 ,$role3]);
        Permission::create(['name' =>'VistaCrearP'])->syncRoles([$role1]);
        Permission::create(['name' =>'Cestado'])->syncRoles([$role1]);
        Permission::create(['name' =>'CrearProducto'])->syncRoles([$role1]);
        
        Permission::create(['name' =>'VistaListarV'])->syncRoles([$role1,$role2 ,$role3]);
        Permission::create(['name' =>'VistaCrearV'])->syncRoles([$role1,$role3]);
        Permission::create(['name' =>'CrearVenta'])->syncRoles([$role1,$role3]);

    }
}
