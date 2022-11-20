<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id'
    ];

    public function CartProducts(){
        return $this->hasMany(Cart::class, 'cart_products');
    }

    public function CartProduct(){
        return $this->hasMany(Product::class, 'cart_products');
    }
}
