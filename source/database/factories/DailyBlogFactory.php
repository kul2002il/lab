<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeeklyBlog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyBlog>
 */
class DailyBlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'week_blog_id' => WeeklyBlog::all()->random()->id,
            'date' => $this->faker->date(),
            'filled' => rand(0, 127),
        ];
    }
}
