<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(asText: true),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement([
                'investigation',
                'development',
                'support',
                'frozen',
                'closed'
            ]),
            'customer_id' => Customer::factory(),
            'parent_id' => null,
            'email' => $this->faker->email(),
            'reportable' => rand(0, 127),
            'report_day' => $this->faker->dayOfWeek(),
            'report_time' => $this->faker->time(),
            'note' => $this->faker->text(),
        ];
    }
}
