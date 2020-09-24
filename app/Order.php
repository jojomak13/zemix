<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'content', 'description', 'notes', 'address', 'history', 'barcode', 'price', 'seller_id', 'city_id', 'status_id', 'driver_id'
    ];
}
