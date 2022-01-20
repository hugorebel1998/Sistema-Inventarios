<?php

use App\Denomination;
use Illuminate\Database\Seeder;

class DenominationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denomination::create([
            'tipo' => 'Billete',
            'valor' => 1000 
        ]);
        Denomination::create([
            'tipo' => 'Billete',
            'valor' => 500 
        ]);
        Denomination::create([
            'tipo' => 'Billete',
            'valor' => 200 
        ]);
        Denomination::create([
            'tipo' => 'Billete',
            'valor' => 100 
        ]);
        Denomination::create([
            'tipo' => 'Billete',
            'valor' => 50 
        ]);
        Denomination::create([
            'tipo' => 'Billete',
            'valor' => 20 
        ]);
        Denomination::create([
            'tipo' => 'Moneda',
            'valor' => 10 
        ]);
        Denomination::create([
            'tipo' => 'Moneda',
            'valor' => 5 
        ]);
        Denomination::create([
            'tipo' => 'Moneda',
            'valor' => 2 
        ]);
        Denomination::create([
            'tipo' => 'Moneda',
            'valor' => 1 
        ]);
        Denomination::create([
            'tipo' => 'Moneda',
            'valor' => 0.5 
        ]);
        Denomination::create([
            'tipo' => 'Otro',
            'valor' => 0 
        ]);
    }
}
