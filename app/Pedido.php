<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'status','tipo_pedido','fecha', 'user_id', 'cliente_id'
      ];

}
