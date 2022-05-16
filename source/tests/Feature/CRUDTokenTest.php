<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CRUDTokenTest extends TestCase
{
    /**
     * {@inheritDoc}
     * @see \Illuminate\Foundation\Testing\TestCase::setUp()
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->authorization();
    }

    /**
     * Create
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->get('/api/token/test token');
        $response->assertStatus(404);

        $response = $this->post('/api/token', ['name' => 'test token']);
        $response->assertStatus(201);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.name' => ['required', 'string'],
            'data.token' => ['required', 'string'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );

        $response = $this->get('/api/token/test token');
        $response->assertStatus(200);
    }

    /**
     * Read
     *
     * @return void
     */
    public function test_read()
    {
        $response = $this->get('/api/token');
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.tokens' => ['required', 'array'],
            'data.tokens.*.name' => ['required', 'string'],
            'data.tokens.*.abilities' => ['required', 'array'],
            'data.tokens.*.abilities.*' => ['required', 'string'],
            'data.tokens.*.last_used_at' => ['date', 'nullable'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );
    }

    /**
     * Read one
     *
     * @return void
     */
    public function test_read_one()
    {
        $response = $this->get('/api/token/test token');
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.name' => ['required', 'string'],
            'data.abilities' => ['required', 'array'],
            'data.abilities.*' => ['required', 'string'],
            'data.last_used_at' => ['date', 'nullable'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );
    }

    /**
     * Update
     *
     * @return void
     */
    public function test_update()
    {
        $response = $this->get('/api/token/test token');
        $response->assertStatus(200);
        $response = $this->get('/api/token/new name test token');
        $response->assertStatus(404);

        $response = $this->put('/api/token/test token', [
            'name' => 'new name test token'
        ]);
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.name' => ['required', 'string'],
            'data.abilities' => ['required', 'array'],
            'data.abilities.*' => ['required', 'string'],
            'data.last_used_at' => ['date', 'nullable'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );
        $data = $validator->validated();
        $this->assertSame(
            'new name test token',
            $data['data']['name'],
            "Token {$data['data']['name']} did not accept the new name."
        );

        $response = $this->get('/api/token/test token');
        $response->assertStatus(404);
        $response = $this->get('/api/token/new name test token');
        $response->assertStatus(200);
    }

    /**
     * Delete
     *
     * @return void
     */
    public function test_delete()
    {
        $response = $this->delete('/api/token/new name test token');
        $response->assertStatus(204);
        $response = $this->get('/api/token/new name test token');
        $response->assertStatus(404);
    }
}
