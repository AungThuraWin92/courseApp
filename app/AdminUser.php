<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
	protected $table = 'users';
	
    protected $fillable = [
        'name', 'email', 'is_admin', 'credits', 'password', 'activated',
    ];
}
