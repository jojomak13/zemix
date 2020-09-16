<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Driver;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(18, 35),
        'ssn' => $faker->ssn,
        'vehicle' => $faker->randomElement(['car', 'motor_bike']),
        'vehicle_number' => Factory::create('ms_MY')->jpjNumberPlate,
        'phone' => $faker->e164PhoneNumber,
        'trusted' => $faker->randomElement([true, false])
    ];
});
