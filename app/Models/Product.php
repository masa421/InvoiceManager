<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relationship to user
    public function findProduct(){
        return $this->hasMany(Product::class, 'category');
    }    
}
