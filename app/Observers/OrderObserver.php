<?php

namespace App\Observers;

use App\Order;
use App\Driver;
use App\Status;
use Carbon\Carbon;
use Faker\Factory;
use App\Transaction;

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
        // Shipping Price
        $cityPrice = $order->seller->prices->find($order->city_id);

        if($cityPrice){
            $order->shipping_price = $cityPrice->pivot->shipping_price;
        } else {
            $order->shipping_price = $order->city->shipping_price;
        }
    }

    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        // Barcode
        $faker = Factory::create();
        $order->barcode = $order->id . $order->id;
        $order->save();
    }

    /**
     * Handle the order "updating" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function updating(Order $order)
    {
        // $data = request()->all();
        $guard = explode('_', auth()->guard()->getName())[1];

        if($guard == 'admin'){
            if($order->status_id != $order->getOriginal('status_id') || $order->driver_id != $order->getOriginal('driver_id')){
                $time = Carbon::now();
                $name = (request()->has('as_driver'))? Driver::findOrFail($order->driver_id)->name : auth('admin')->user()->name;

                $history = $order->serialized_history;
                $history[] = [
                    "status" => Status::findOrFail($order->status_id)->name,
                    "name" => $name,
                    'created_at' => $time->toDateTimeString()
                ];

                $order->history = $history;
            }
        }

    }


    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        // In case of order status is COD
        if($order->status_id == 6 || $order->status_id == 8){
            Transaction::create([   
                'barcode' => $order->barcode,
                'client_name' => $order->client_name,
                'status' => $order->status->name,
                'price' => $order->price,
                'shipping_price' => $order->shipping_price,
                'seller_id' => $order->seller_id
            ]);
            
            session()->flash('info', 'Order moved to seller balance successfully.');

        } else if($order->status_id == 7) {
            // In case of order status is Failed
            Transaction::create([   
                'barcode' => $order->barcode,
                'client_name' => $order->client_name,
                'status' => $order->status->name,
                'price' => $order->price,
                'shipping_price' => 0,
                'seller_id' => $order->seller_id
            ]);
            
            session()->flash('info', 'Order moved to seller balance successfully.');

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
