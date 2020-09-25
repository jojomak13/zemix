<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_name', 'phone', 'content', 'description', 'notes', 'address', 'history', 'barcode', 'price', 'seller_id', 'city_id', 'status_id', 'driver_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
