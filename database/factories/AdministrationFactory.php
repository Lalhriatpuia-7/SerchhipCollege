<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Category_type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Administration>
 */
class AdministrationFactory extends Factory
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
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,
            'user_id' => User::all()->random()->id,

        ];
    }
}