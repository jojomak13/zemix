<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $guarded = [];
    protected $appends = ['total_amount'];

    public function gettotalAmountAttribute()
    {
        return $this->price + $this->shipping_price;
    }
}
