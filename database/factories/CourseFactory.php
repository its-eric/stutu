<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Math', 'Java','Computer','C++']),
        'description' => $faker->text,
        'discount' => $faker->randomDigit,
        'tuition_fee'=> $faker->randomDigit,
    ];
});
