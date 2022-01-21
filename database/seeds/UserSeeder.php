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
        User::create([
            'name' => 'Hugo',
            'apellido_p' => 'Guillermo',
            'apellido_m' => 'Segundo',
            'email' => 'administrador@administrador.com',
            'telefono' => '5510570200',
            'password' => bcrypt('12345678'),
            'permiso' => '1'
        ]);
    }
}
