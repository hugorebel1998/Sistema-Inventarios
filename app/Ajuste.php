<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $fillable = [
        'nombre_empresa','impuesto','moneda','logo'
      ];
}
