<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Category_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examination>
 */
class ExaminationFactory extends Factory
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
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,
        ];
    }
}