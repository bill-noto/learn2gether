<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LanguageUser>
 */
class LanguageUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'language_id' => $this->faker->numberBetween(1, 11),
            'user_id' => $this->faker->numberBetween(3, 22)
        ];
    }
}
