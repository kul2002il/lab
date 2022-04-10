<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LdapAuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_auth_in_application()
    {
        $credentials = [
            'nick' => env('TEST_USER_NICK'),
            'password' => env('TEST_USER_PASSWORD'),
        ];
        $this->assertTrue(
            Auth::attempt($credentials),
            'Авторизация пользователя test провалена.'
        );
    }
}
