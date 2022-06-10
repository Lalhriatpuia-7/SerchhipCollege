<?php

namespace Database\Factories;

use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculums>
 */
class CurriculumsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->word(),
            'session_id' => Session::factory(),
            'event_name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'event_start_date' => $this->faker->date(),
            'event_end_date' => $this->faker->date(),
        ];
    }
}