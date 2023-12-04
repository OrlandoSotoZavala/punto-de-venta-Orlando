<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
    'name',
    'email',
    'ruc_number',
    'address',
    'phone'
    ];

    //crear la relación con los productos de una proveedor(relación 1 a muchos)
    public function productos(){
        return $this->hasMany(Product::class);
    }
}



