<?php

namespace Database\Seeders;

use App\Models\SubjectRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectRelation::create([
            'relationship' => 'core'
        ]);

        SubjectRelation::create([
            'relationship' => 'elective'
        ]);
    }
}