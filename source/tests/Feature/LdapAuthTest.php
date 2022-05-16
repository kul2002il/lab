<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LdapAuthTest extends TestCase
{
    public function test_auth_in_application()
    {
        $credentials = [
            'nick' => env('TEST_USER_NICK'),
            'password' => env('TEST_USER_PASSWORD'),
        ];
        $this->assertTrue(
            Auth::attempt($credentials),
            'Testuser authorization failed'
        );
    }
}
