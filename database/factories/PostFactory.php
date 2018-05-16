<?php

use Faker\Generator as Faker;
use App\Post;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    $userIds = User::where('role', 'tutor')->get()->pluck('id')->toArray();

    return [
        'title' => $faker->text(64),
        'content' => $faker->text(256),
        'status' => $faker->randomElement(['done', 'todo']),
        'user_id' => $faker->randomElement($userIds),
    ];
});
