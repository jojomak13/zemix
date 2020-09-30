<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'age', 'ssn', 'vehicle', 'vehicle_number', 'phone', 'trusted', 'password'];


    protected $hidden = [
        'password', 'remember_token',
    ];

}
