<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderActionsReason;
use Faker\Generator as Faker;

$factory->define(OrderActionsReason::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'title_en' => $faker->word,
        'active' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
