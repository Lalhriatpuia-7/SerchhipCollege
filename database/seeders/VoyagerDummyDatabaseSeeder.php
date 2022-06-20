<?php

namespace Database\Seeders;

use App\Models\SubjectRelation;
use Illuminate\Database\Seeder;

class VoyagerDummyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Category_typeTableSeeder::class,
            CategoriesTableSeeder::class,
            PreUserSeedData::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            PagesTableSeeder::class,
            TranslationsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SubjectRelationSeeder::class,
        ]);
    }
}