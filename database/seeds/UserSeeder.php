<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin1 = User::create([
            'name' => 'Hugo',
            'apellido_p' => 'Guillermo',
            'apellido_m' => 'Segundo',
            'email' => 'hugo@administrador.com',
            'telefono' => '5510570200',
            'password' => bcrypt('12345678'),
            'permiso' => '1'
        ]);
        $admin1->assignRole('admin');

        $admin2 = User::create([
            'name' => 'Jaqueline',
            'apellido_p' => 'Santos',
            'apellido_m' => 'Santos',
            'email' => 'jaqueline@administrador.com',
            'telefono' => '5526135011',
            'password' => bcrypt('12345678'),
            'permiso' => '1'
        ]);
        $admin2->assignRole('admin');
    }
}
