<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Worker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeeklyBlog>
 */
class WeeklyBlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'worker_nick' => Worker::all()->random()->nick,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
