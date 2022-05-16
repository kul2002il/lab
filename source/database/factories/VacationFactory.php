<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacation>
 */
class VacationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'worker_nick' => fn()=>Worker::factory()->create()->nick,
            'start_date' => $start_date = $this->faker->date(),
            'end_date' => (new Carbon($start_date))->addDay(rand(0,10)),
            'type' => $this->faker->randomElement(['Official','Real','Work']),
            'comment' => $this->faker->sentence(),
        ];
    }
}
