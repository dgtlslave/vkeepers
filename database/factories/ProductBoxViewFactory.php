<?php

use Faker\Generator as Faker;

$factory->define(App\ProductBoxView::class, function (Faker $faker) {
    return [
        'url_box_view' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
