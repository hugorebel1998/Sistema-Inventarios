<?php

use App\Ajuste;
use Illuminate\Database\Seeder;

class GeneralRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ajuste::create([
           'name' => 'CMS', 
        //    'impuesto' => 'IVA',
        //    'porcentaje_impuesto' => 16.00,
           'moneda' => 'MXN',
        ]);
    }
}
