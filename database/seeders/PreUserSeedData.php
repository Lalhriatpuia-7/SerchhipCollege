<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category_type;
use App\Models\User_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreUserSeedData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User_type::create([

            'name' => 'Admin',
            'description' => 'User with super privillages',
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,
        ]);
        User_type::create([

            'name' => 'User',
            'description' => 'User with normal privillages',
            'category_id' => Categories::all()->random()->id,
            'category_type_id' => Category_type::all()->random()->id,
        ]);
    }
}