<?php

namespace Database\Factories;

use App\Models\Departments;
use App\Models\Session;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topper>
 */
class TopperFactory extends Factory
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
            'rank' => $this->faker->word(),
            'department_id' => Departments::all()->random()->id,
            'subject_id' => Subjects::all()->random()->id,
            'session_id' => Session::all()->random()->id,
        ];
    }
}