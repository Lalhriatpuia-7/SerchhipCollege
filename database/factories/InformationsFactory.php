<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Category_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Informations>
 */
class InformationsFactory extends Factory
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
            'subject' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'published_date' => $this->faker->date(),
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,
        ];
    }
}