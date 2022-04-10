<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nick' => substr($this->faker->userName(),0,15),
            'name' => $this->faker->name(),
            'birthday' => $this->faker->date(max: '2006-01-01'),
            'role' => $this->faker->words(asText: true),
            'email' => $this->faker->email(),
            'department_id' => Department::all()->random()->id,
            'department_lead' => rand(0, 255),
            'image_small' => '',
            'image_big' => '',
            'old_domain_pass' => $this->faker->password(),
            'enabled' => rand(0, 255),
            'company' => $this->faker->randomElement(['ТС', 'Р'])
        ];
    }
}
