<?php

use Faker\Generator as Faker;

$factory->define(App\Dealer::class, function (Faker $faker) {
    return [
        'dealer_profiles_id' => $faker->numberBetween(1, 20),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'merchant_address' => $faker->streetAddress,
        'contact_person' => $faker->name,
        'city_id' => $faker->numberBetween(1, 59),
        'merchant_lat' => $faker->latitude($min = -90, $max = 90),
        'merchant_long' => $faker->longitude($min = -180, $max = 180),
        'merchant_radius' => $faker->randomElement($array = array (2, 10, 15, 30))
    ];
});