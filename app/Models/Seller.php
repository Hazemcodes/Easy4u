<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'name',
        'email',
        'password',
        'gender',
        'phoneNumber',
        'type',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
