<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['student', 'tutor']),
        'birthday' => $faker->date('Y-m-d'),
        'gender' => $faker->randomElement(['male', 'female']),
        // 'profile_picture' => $faker->image('public/img', '100', '100', 'cats'),
        // 'experience' => $faker->randomElement(['Master', 'PhD'])->where('role', '=', 'tutor'),
        'url' => $faker->url,
        'expectation' => $faker->randomElement(['Math', 'ComputerScience']),
    ];
});
