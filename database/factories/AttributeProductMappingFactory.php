<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AttributeProductMapping;
use Faker\Generator as Faker;

$factory->define(AttributeProductMapping::class, function (Faker $faker) {

    return [
        'product_id' => $faker->word,
        'attribute_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
