<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $fillable = [
        'fecha_pago','total_pago','venta_id'
      ];
}
