<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function authorization()
    {
        Sanctum::actingAs(
            User::firstWhere('nick', env('TEST_USER_NICK'))
        );
    }
}
