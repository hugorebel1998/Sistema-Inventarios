<?php

use App\UnidaMedida;
use Illuminate\Database\Seeder;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidaMedida::create([
            'name' => 'kilos',
            'prefijo' => 'Kg'
        ]);

        UnidaMedida::create([
            'name' => 'Caja',
            'prefijo' => 'Cja'
        ]);

        UnidaMedida::create([
            'name' => 'Arpia',
            'prefijo' => 'Apa'
        ]);
    }
}
