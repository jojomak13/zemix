<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Driver;
use Faker\Generator as Faker;

function generateHistory($driver) {
    $driver = Driver::find($driver);

    return json_encode([
        [
            "status" => "processing",
            "name" => $driver->name,
            "created_at" => now()
        ]
    ]);
}

$factory->define(Order::class, function (Faker $faker) {
    $driverId = $faker->numberBetween(1, 20);

    return [
        'client_name' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'content' => $faker->text,
        'description' => $faker->text(150),
        'notes' => '',
        'address' => $faker->address,
        'barcode' => $faker->unique()->ean8,
        'history' => generateHistory($driverId),
        'price' => $faker->randomFloat(2, 50, 1500),
        'seller_id' => $faker->numberBetween(1, 100), 
        'city_id' => $faker->numberBetween(1, 10),
        'status_id' => $faker->numberBetween(1, 13),
        'driver_id' => $driverId,
    ];
});
