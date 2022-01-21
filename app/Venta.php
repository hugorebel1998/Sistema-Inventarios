<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'tipo_venta','tipo_comprobante','serie_comprobante','num_comprobante',
        'fecha', 'impuesto', 'total', 'status', 'pedido_id','user_id'
    ];
}
