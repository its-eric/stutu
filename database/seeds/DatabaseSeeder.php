<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 50)->create(); // Generate n user fakers
        factory(App\Course::class, 30)->create(); // Generate n course fakers
        factory(App\Post::class, 100)->create();
    }
}
