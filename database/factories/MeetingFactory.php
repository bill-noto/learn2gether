<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'host_id' => $this->faker->numberBetween(3, 18),
            'patron_id' => $this->faker->numberBetween(3, 18),
            'date_time_of_meeting' => $this->faker->dateTimeBetween('-10 days', '45 days', 'Europe/Paris')
        ];
    }
}
