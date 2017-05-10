<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'stock', 
        'description', 
        'feature_image', 
        'image_one', 
        'image_two',
        'feature',
    ];

    public function categories() 
    {
    	return $this->belongsToMany("App\Category");
    }
}
