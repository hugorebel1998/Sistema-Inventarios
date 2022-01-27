<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status','name','descripcion', 'imagen_producto','category_id ',
        'unidad_id'
    ];

    public function categoriaProduct(){
        return $this->hasOne(Category:: class, 'id', 'category_id');
    }
}
