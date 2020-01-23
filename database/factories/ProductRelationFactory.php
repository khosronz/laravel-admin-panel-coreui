<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductRelation;
use Faker\Generator as Faker;

$factory->define(ProductRelation::class, function (Faker $faker) {

    return [
        'parent_id' => $faker->word,
        'child_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
