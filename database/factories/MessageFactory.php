<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'status' => $faker->word,
        'ticket_id' => $faker->word,
        'user_id' => $faker->word,
        'desc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
