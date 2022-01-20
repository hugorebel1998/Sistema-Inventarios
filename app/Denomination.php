<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Denomination extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipo','valor','imagen_denominacion'
    ];
}
