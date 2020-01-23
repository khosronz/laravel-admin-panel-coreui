<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'status' => $faker->word,
        'severity_id' => $faker->word,
        'organization_id' => $faker->word,
        'user_id' => $faker->word,
        'desc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
