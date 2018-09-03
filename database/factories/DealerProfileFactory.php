<?php

use Faker\Generator as Faker;

$factory->define(App\DealerProfile::class, function (Faker $faker) {
    return [
        'business_owner_name' => $faker->name($gender = 'PP'|'ZAT'|'PAT'),
        'merchant_name' => $faker->name,
        'merchant_network_name' => $faker->company
    ];
});
