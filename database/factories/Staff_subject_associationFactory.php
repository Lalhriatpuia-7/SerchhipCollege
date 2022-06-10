<?php

namespace Database\Factories;

use App\Models\Subjects;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff_subject_association>
 */
class Staff_subject_associationFactory extends Factory
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
            'subject_id' => Subjects::all()->random()->id,

        ];
    }
}
