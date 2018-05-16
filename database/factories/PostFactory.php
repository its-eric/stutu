<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    $userIds = User::where('role', 'tutor')->get()->pluck('id')->toArray();

    return [
        'title' => $faker->text,
        'content' => $faker->text,
        'status' => $faker->randomElement(['published', 'draft']),
        'user_id' => $faker->randomElement($userIds),
    ];
});
