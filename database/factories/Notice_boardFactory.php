<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Category_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice_board>
 */
class Notice_boardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'published_date' => $this->faker->date(),
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,

        ];
    }
}
