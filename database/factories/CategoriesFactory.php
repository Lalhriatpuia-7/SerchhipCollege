<?php

namespace Database\Factories;

use App\Models\Category_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->sentence(),
            'name' => $this->faker->name(),
            // 'order' => $this->faker->numberBetween(1, 99999),
            'description' => $this->faker->paragraph(),
            'category_type_id' => Category_type::all()->random()->id,
        ];
    }
}
