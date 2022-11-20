<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_id'
    ];

    public function CatergoryProducts(){
        return $this->hasMany(Product::class, 'category_products');
    }

    public function CatergoryProduct(){
        return $this->hasMany(Category::class, 'category_products');
    }
}
