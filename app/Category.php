<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','slug','fecha_compra','user_id','proveedor_id '
    ];

    
    public function categoryUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categoryProveedor()
    {
        return $this->belongsTo(Supplier::class, 'proveedor_id', 'id');
    }
    
}
