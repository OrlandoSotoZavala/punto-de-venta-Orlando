<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'stock',
        'image',
        'sell_price',
        'status',
        'short_description',
        'long_description',
        'category_id',
        'provider_id',
    ];

    //crear la relación con la categoria de los productos(relación 1 a 1)
    public function category(){
        return $this->belongsTo(Category::class);
    }    

    //crear la relación con los proveedores de los productos(relación 1 a 1)
    public function provider(){
        return $this->belongsTo(Provider::class);
    }   

}

