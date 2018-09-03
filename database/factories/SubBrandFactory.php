<?php

use Faker\Generator as Faker;

$factory->define(App\SubBrand::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
