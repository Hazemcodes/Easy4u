<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'country_id',
        'name',
        'description',
        'photo',
        'price',
        'weight' ,
        'dimensions',
        'materials',
    ];
    
    public function categories(){
        return $this->belongsTo(CategoryProduct::class);
    }
    
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function carts(){
        return $this->belongsTo(CartProduct::class);
    }

    public function colors(){
        return $this->hasMany(Color::class);
    }

    public function sizes(){
        return $this->hasMany(Size::class);
    }
}
