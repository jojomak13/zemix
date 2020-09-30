<?php

namespace App\Observers;

use App\Order;
use App\Driver;
use App\Status;
use Carbon\Carbon;

class OrderObserver
{
    /**
     * Handle the order "creating" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
        $cityPrice = $order->seller->prices->find($order->city_id);

        if($cityPrice){
            $order->shipping_price = $cityPrice->pivot->shipping_price;
        } else {
            $order->shipping_price = $order->city->shipping_price;
        }
    }

    /**
     * Handle the order "updating" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function updating(Order $order)
    {
        $data = request()->all();
        
        if($data['status_id'] != $order->getOriginal('status_id') || $data['driver_id'] != $order->getOriginal('driver_id')){
            $time = Carbon::now();
            $name = (request()->has('as_driver'))? Driver::findOrFail($data['driver_id'])->name : auth()->guard('admin')->user()->name;

            $data['history'] = $order->serialized_history;
            $data['history'][] = [
                "status" => Status::findOrFail($data['status_id'])->name,
                "name" => $name,
                'created_at' => $time->toDateTimeString()
            ];

            $order->history = $data['history'];
        }
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
