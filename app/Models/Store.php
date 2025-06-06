<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    use HasFactory;
    
    protected $fillable = ['store_name', 'status', 'rating', 'lat', 'long']; // Add fillable attributes

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
