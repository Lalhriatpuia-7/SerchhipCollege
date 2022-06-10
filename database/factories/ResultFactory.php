<?php

namespace Database\Factories;


use App\Models\Departments;
use App\Models\Examination;
use App\Models\Session;
use App\Models\Subjects;
use App\Models\User;
use App\Models\User_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->word(),
            'examination_id' => Examination::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'user_type_id' => User_type::all()->random()->id,
            'subject_id' => Subjects::all()->random()->id,
            'department_id' => Departments::all()->random()->id,
            'session_id' => Session::all()->random()->id,
            'internal_mark_scored' => $this->faker->numberBetween(0, 25),
            'external_mark_scored' => $this->faker->numberBetween(0, 75),


        ];
    }
}