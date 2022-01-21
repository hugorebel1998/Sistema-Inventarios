<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name','apellidos','email','telefono_1','telefono_2','calle',
        'numero_int', 'numero_ext', 'colonia', 'municipio', 'imagen_proveedor'
    ];



    public function categoryProvedor()
    {
        return $this->hasMany(Category::class, 'id', 'proveedor_id');
    }
}
