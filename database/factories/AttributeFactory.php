<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Attribute;
use Faker\Generator as Faker;

$factory->define(Attribute::class, function (Faker $faker) {

    return [
        'code' => $faker->word,
        'admin_name' => $faker->word,
        'type' => $faker->word,
        'validation' => $faker->word,
        'position' => $faker->randomDigitNotNull,
        'is_unique' => $faker->randomDigitNotNull,
        'value_per_locale' => $faker->randomDigitNotNull,
        'value_per_channel' => $faker->randomDigitNotNull,
        'is_filterable' => $faker->randomDigitNotNull,
        'is_configurable' => $faker->randomDigitNotNull,
        'is_user_defined' => $faker->randomDigitNotNull,
        'is_visible_on_front' => $faker->randomDigitNotNull,
        'is_required' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
