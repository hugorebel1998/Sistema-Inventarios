<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UnidadesSeeder::class);
        $this->call(GeneralRequest::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
    }
}
