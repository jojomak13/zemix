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
        'name', 'email', 'password', 'company_name', 'address', 'phone', 'city_id', 'is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function prices()
    {
        return $this->belongsToMany(City::class, 'city_seller_price', 'seller_id', 'city_id')
            ->withpivot('shipping_price')
            ->withTimeStamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'seller_id', 'id');
    }

    public function syncCitiesShipping($prices, $cities)
    {
        $data = [];

        if($prices && count($prices))
            for($i = 0; $i < count($prices); $i++){
                if(!$cities[$i]) continue;
                $data[$cities[$i]] = [
                    'shipping_price' => $prices[$i]
                ];
            }

       $this->prices()->sync($data);
    }
}
