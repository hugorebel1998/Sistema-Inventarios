<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status','name','costo','precio_venta','existencia','nivel_existencia','descripcion', 'imagen_producto','category_id',
        'unidad_id'
    ];

  
}
