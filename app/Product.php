<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','codigo_de_barra','costo','precio_venta','existencia','nivel_existencia','category_id'
    ];
}
