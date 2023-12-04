<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'];

    //crear la relación con los productos de una categoria(relación 1 a muchos)
    public function productos(){
        return $this->hasMany(Product::class);
    }
}
