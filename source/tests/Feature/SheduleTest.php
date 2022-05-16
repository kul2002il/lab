<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SheduleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->authorization();
    }

    /**
     * Correct request test.
     *
     * @return void
     */
    public function test_shedule_official_validate()
    {
        $response = $this->get('api/shedule/official?start_date=2010-08-15&end_date=2010-08-15');
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.days' => ['required', 'array'],
            'data.days.*.status' => ['required', 'string'],
            'data.days.*.info' => ['array'],
            'data.days.*.info.*' => ['required', 'string'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );
    }

    /**
     * Correct request test.
     *
     * @return void
     */
    public function test_shedule_workers_validate()
    {
        $response = $this->get('api/shedule/worker?start_date=2010-08-15&end_date=2010-08-15');
        $response->assertStatus(200);
        $data = $response->json();

        $validator = Validator::make($data, [
            'data.*' => ['required', 'array'],
            'data.*.days.*.status' => ['required', 'string'],
            'data.*.days.*.total_hours' => ['number'],
            'data.*.days.*.info' => ['array'],
            'data.*.days.*.info.*' => ['required', 'string'],
        ]);

        $errors = $validator->errors()->all();
        $this->assertEmpty(
            $errors,
            "The application returned an incorrect response to the request. " .
            "Errors:\n" . implode("\n", $errors)
        );
    }
}
