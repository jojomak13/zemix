<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'content', 'decsription', 'notes', 'address', 'history', 'barcode', 'price', 'seller_id', 'city_id', 'status_id' 
    ];
}
