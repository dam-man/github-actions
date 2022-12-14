<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_exsist_in_database()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_invalid_password2()
    {
        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password2',
        ]);

        $this->assertGuest();
    }
}
