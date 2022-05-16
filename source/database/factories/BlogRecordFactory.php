<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DailyBlog;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogRecord>
 */
class BlogRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_id' => DailyBlog::factory(),
            'project_id' => Project::factory(),
            'time' => rand(0,100)/10,
            'type' => $this->faker->randomElement([
                'Bug Fixing',
                'Development',
                'Support',
                'Consulting',
                'Testing',
                'Design',
                'Plan',
                'Documentation',
                'Localization'
            ]),
            'description' => $this->faker->text(),
            'plan_notify' => $this->faker->randomElement(['0', '1']),
            'plan_notify_date' => $this->faker->date(),
            'dt' => $this->faker->dateTime(),
        ];
    }
}
