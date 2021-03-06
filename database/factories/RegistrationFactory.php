<?php

namespace Database\Factories;

use App\Models\Departments;
use App\Models\Session;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'registration_number' => $this->faker->numberBetween(1000, 9999),
            'roll_no' => $this->faker->numberBetween(0, 9999),
            'department_id' => Departments::all()->random()->id,
            'session_id' => Session::all()->random()->id,
            'subject_id' => Subjects::all()->random()->id,
            'semester_id' => Subjects::all()->random()->id,
        ];
    }
}