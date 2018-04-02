<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Course::class, function (Faker $faker) {
    $userIds = User::where('role', 'tutor')->get()->pluck('id')->toArray();

    return [
        'name' => $faker->randomElement(['Math', 'Java','Computer','C++']),
        'description' => $faker->text,
        'discount' => $faker->randomDigit,
        'tuition_fee'=> $faker->randomDigit,
        'user_id' => $faker->randomElement($userIds),
    ];
});
