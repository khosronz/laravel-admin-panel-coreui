<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'product_id' => $faker->word,
        'order_id' => $faker->word,
        'dns' => $faker->word,
        'ip' => $faker->word,
        'dns_ip_status' => $faker->word,
        'status' => $faker->word,
        'start_time' => $faker->word,
        'end_time' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
