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
        $statuses = [
           'processing' => '',
           'picked up' => '',
           'preapering for shipment' => '',
           'shipped' => '',
           'delivered' => '',
           'done cash recieved' => '',
           'cod received' => '', 
           'failed' => 'fees collected form client',
           'canceled' => 'fees not collected',
           'couldn’t reach client' => '',
           'client rescheduled' => '',
           'reshelved' => '',
           'return to seller' => ''
        ];

        foreach($statuses as $name => $desc){
            Status::create([
                'name' => $name,
                'description' => $desc
            ]);
        }
    }
}
