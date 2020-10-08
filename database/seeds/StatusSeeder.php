<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Note:: dont't change the order of them
        $statuses = [
           'Processing' => '',
           'Picked up' => '',
           'Preapering for shipment' => '',
           'Shipped' => '',
           'Delivered' => '',
           'COD received' => 'cash on delivery', 
           'Failed' => 'fees collected form client',
           'Canceled' => 'fees not collected',
           'Couldn’t reach client' => '',
           'Client rescheduled' => '',
           'Reshelved' => '',
           'Return to seller' => ''
        ];

        foreach($statuses as $name => $desc){
            Status::create([
                'name' => $name,
                'description' => $desc
            ]);
        }
    }
}
