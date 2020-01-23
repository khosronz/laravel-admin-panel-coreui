<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductFeatures;
use Faker\Generator as Faker;

$factory->define(ProductFeatures::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'price' => $faker->word,
        'product_id' => $faker->word,
        'desc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
