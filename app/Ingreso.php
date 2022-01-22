<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = [
         'status','tipo_comprobante','serie_comprobante','num_comprobante','fecha', 
         'impuesto', 'total','user_id', 'proveedor_id'
      ];
}
