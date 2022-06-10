<?php

namespace Database\Factories;

use App\Models\Examination;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questions>
 */
class QuestionsFactory extends Factory
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
            'subject_id' => Subjects::all()->random()->id,
            'question_number' => $this->faker->numberBetween(1, 100000),
            'question' => $this->faker->sentence() . '?',
            'answer' => $this->faker->paragraph(),
            'examination_id' => Examination::all()->random()->id,
        ];
    }
}