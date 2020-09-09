<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bCrypt('123456'), 
        'remember_token' => Str::random(10),
        'company_name' => $faker->company,
        'city_id' => 1,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber
    ];
});
