<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    protected $fillable = [
        'name', 'email', 'password', 'company_name', 'address', 'phone', 'city_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
