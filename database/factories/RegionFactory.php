<?php

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['north', 'east', 'west', 'south'])
    ];
});
