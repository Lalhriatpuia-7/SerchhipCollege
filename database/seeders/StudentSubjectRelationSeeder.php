<?php

namespace Database\Seeders;

use App\Models\StudentSubjectRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSubjectRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentSubjectRelation::factory(200)->create();
    }
}