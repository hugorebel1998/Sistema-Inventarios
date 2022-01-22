<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
<<<<<<< HEAD
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
    
=======
        'status','name','slug'
      ];
>>>>>>> 39b1dc3dc70ced6512677bc521c5783bced8657f
}
