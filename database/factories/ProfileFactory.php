<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'function' => $faker->randomElement(['user', 'admin', 'supervisor']),
        'city_id' => $faker->numberBetween(1, 59),
        'phone' => $faker->tollFreePhoneNumber(),
        'image' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
