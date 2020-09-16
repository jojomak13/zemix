<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name', 'age', 'ssn', 'vehicle', 'vehicle_number', 'phone', 'trusted'];
}
