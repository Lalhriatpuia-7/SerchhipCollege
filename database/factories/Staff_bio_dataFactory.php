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
            'experience' => $this->faker->numberBetween(1, 60),
            'rating' => $this->faker->numberBetween(0, 10),
            'staff_subject_association_id' => Staff_subject_association::all()->random()->id,
        ];
    }
}
