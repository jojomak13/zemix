<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'zip_code' => $faker->postcode,
        'shipment_price' => $faker->randomFloat(2, 5, 100)
    ];
});
