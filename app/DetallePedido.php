<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $fillable = [
        'cantidad','precio_venta','descuento', 'pedido_id', 'detalle_ingreso_id'
      ];

}
