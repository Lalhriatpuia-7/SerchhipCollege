<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Category_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subjects>
 */
class SubjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,

        ];
    }
}
