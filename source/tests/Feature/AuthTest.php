<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Тесты на проверку доступности ресурсов в зависимости от аутентификации
 * в системе.
 */
class AuthTest extends TestCase
{
    /**
     * Проверка кодов ответов при отсутствии аутентификации.
     *
     * @return void
     */
    public function test_unauthorized()
    {
        $this->post('/api/login', [], [
            'Accept' => 'application/json'
        ])->assertStatus(422);

        $this->get('/api/report/hours/short')->assertStatus(401);
        $this->get('/api/report/hours/project')->assertStatus(401);

        $this->post('/api/token')->assertStatus(401);
        $this->get('/api/token')->assertStatus(401);
        $this->get('/api/token/my_token_name')->assertStatus(401);
        $this->put('/api/token/my_token_name')->assertStatus(401);
        $this->delete('/api/token/my_token_name')->assertStatus(401);
    }

    /**
     * Проверка кодов ответов при аутентификации.
     *
     * @return void
     */
    public function test_authorized()
    {
        $this->post('/api/login', [
            'nick' => env('TEST_USER_NICK'),
            'password' => env('TEST_USER_PASSWORD')
        ])->assertStatus(200);

        $this->get('/api/report/hours/short')->assertStatus(200);
        $this->get('/api/report/hours/project')->assertStatus(200);

        $tokenName = 'token ' . rand();
        $this->post('/api/token', [
            'name' => $tokenName
        ])->assertStatus(201);
        $this->get('/api/token')->assertStatus(200);
        $this->get("/api/token/$tokenName")->assertStatus(200);
        $this->put("/api/token/$tokenName")->assertStatus(200);
        $this->delete("/api/token/$tokenName")->assertStatus(204);
    }
}
