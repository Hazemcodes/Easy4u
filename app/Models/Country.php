<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function sellers(){
        return $this->hasMany(Seller::class);
    }

    public function admins(){
        return $this->hasMany(Admin::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
