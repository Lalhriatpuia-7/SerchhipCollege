<?php

namespace Database\Seeders;

use App\Models\Category_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category_type::create([

            'name' => 'Subject',
            'description' => 'categories for Subjects',
        ]);
        Category_type::create([

            'name' => 'User Roles',
            'description' => 'categories for User Roles',
        ]);
        Category_type::create([

            'name' => 'Registration',
            'description' => 'categories for Registrations',
        ]);
        Category_type::create([

            'name' => 'Activities',
            'description' => 'categories for Activities',
        ]);
        Category_type::create([

            'name' => 'News and information',
            'description' => 'categories for News and Informations',
        ]);
    }
}