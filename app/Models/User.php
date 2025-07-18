<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'username', 'password', 'plain_password', 'role'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
}
