<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $fillable = [
        'codigo','serie','descipcion', 'stock_ingreso', 'stock_actual', 'precio_compra',
        'precio_venta_distribuidor', 'precio_venta_publico', 'ingreso_id', 'producto_id'
      ];
}
