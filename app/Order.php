<?php

namespace App;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_name', 'phone', 'content', 'description', 'notes', 'address', 'history', 'barcode', 'price', 'shipping_price', 'seller_id', 'city_id', 'status_id', 'driver_id'
    ];

    protected $appends = ['total_price'];

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

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function getSerializedHistoryAttribute()
    {
        return json_decode($this->history);
    }

    public function getTotalPriceAttribute()
    {
        return $this->price + $this->shipping_price;
    }

}
