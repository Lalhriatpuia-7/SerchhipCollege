<?php

namespace Database\Factories;

use App\Models\Staff_subject_association;
use App\Models\User;
use App\Models\User_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff_bio_data>
 */
class Staff_bio_dataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'user_type_id' => User_type::all()->random()->id,
            'qualification' => $this->faker->word(),
            'start_date' => $this->faker->numberBetween(1940, now()->year),
            'rating' => $this->faker->numberBetween(0, 10),
            'staff_subject_association_id' => Staff_subject_association::all()->random()->id,
            'graduation_year' => $this->faker->numberBetween(1940, now()->year),
            'staff_details' => $this->faker->paragraph(),
            'institution' => $this->faker->paragraph(),
        ];
    }
}