<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status','name','apellidos','tipo_documento', 'telefono', 'direccion', 'fecha_nacimiento', 
        'email', 'imagen_colavorador' 
      ];
}
