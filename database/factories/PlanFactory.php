<?php

use Faker\Generator as Faker;

$factory->define(App\Plan::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'dealer_id' => $faker->numberBetween(1, 25),
        'box_view_range' => $faker->imageUrl($width = 640, $height = 480),
        'user_lat' => $faker->latitude($min = -90, $max = 90),
        'user_long' => $faker->longitude($min = -180, $max = 180)
    ];
});

