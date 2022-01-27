<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'create usuario']);
        Permission::create(['name' => 'read usuario']);
        Permission::create(['name' => 'update usuario']);
        Permission::create(['name' => 'delete usuario']);

        Permission::create(['name' => 'create producto']);
        Permission::create(['name' => 'read producto']);
        Permission::create(['name' => 'update producto']);
        Permission::create(['name' => 'delete producto']);

        Permission::create(['name' => 'create categoria']);
        Permission::create(['name' => 'read categoria']);
        Permission::create(['name' => 'update categoria']);
        Permission::create(['name' => 'delete categoria']);


       

        $role = Role::create(['name' => 'empleado']);
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('read categoria');


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
