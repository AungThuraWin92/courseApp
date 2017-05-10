<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $fillable = [
        'product_id', 
        'product_name', 
        'user_id', 
        'qty', 
        'totalprice',
    ];
}
