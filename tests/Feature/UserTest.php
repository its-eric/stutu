<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->assertSame(10, 5+5);
        $this->assertDatabaseHas('users', [
            'email' => 'laron.dickinson@example.org'
        ]);
    }
}
