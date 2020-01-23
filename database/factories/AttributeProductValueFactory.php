<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AttributeProductValue;
use Faker\Generator as Faker;

$factory->define(AttributeProductValue::class, function (Faker $faker) {

    return [
        'text_value' => $faker->text,
        'boolean_value' => $faker->randomDigitNotNull,
        'integer_value' => $faker->randomDigitNotNull,
        'float_value' => $faker->word,
        'datetime_value' => $faker->date('Y-m-d H:i:s'),
        'date_value' => $faker->date('Y-m-d H:i:s'),
        'json_value' => $faker->word,
        'product_id' => $faker->word,
        'attribute_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
