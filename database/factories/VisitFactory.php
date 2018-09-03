<?php

use Faker\Generator as Faker;

$factory->define(App\Visit::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 17),
        'dealer_id' => $faker->numberBetween(1, 10),
        'plan_id' => $faker->numberBetween(1, 4),
        'successfuly_visit' => $faker->randomElement($array = array (0, 1)),
        'time_start_visit' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'time_end_visit' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        'status' => $faker->randomElement($array = array ('ready','archive'))
    ];
});


