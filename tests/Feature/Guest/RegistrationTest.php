<?php

namespace Tests\Feature\Guest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_guest_can_access_register_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $this->assertGuest($guard = null);
    }

    public function test_if_guest_can_register()
    {
        $response = $this->post(route('register'), [
            'name' => 'Ewerton',
            'email' => 'ewertonzvd@gmail.com',
            'password' => '19119000',
            'password_confirmation' => '19119000'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'ewertonzvd@gmail.com',
        ]);
    }
}
