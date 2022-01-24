<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status','name','descripcion', 'imagen_producto','category_id',
        'unidad_id'
    ];

    public function producCategory()
    {
        return $this->hasOne(Category::class, 'id', 'categoty_id');
    }
}
