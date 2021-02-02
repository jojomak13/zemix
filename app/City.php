<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'zip_code', 'shipping_price'];

    public function prices()
    {
        return $this->belongsToMany(Seller::class, 'city_seller_price', 'city_id', 'seller_id')
            ->withpivot('shipping_price')
            ->withTimeStamps();
    }

}
