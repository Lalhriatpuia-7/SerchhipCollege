<?php

namespace Database\Seeders;

use App\Models\Administration;
use Illuminate\Database\Seeder;
use App\Models\Courses;
use App\Models\Curriculums;
use App\Models\Departments;
use App\Models\Examination;
use App\Models\Informations;
use App\Models\News;
use App\Models\Notice_board;
use App\Models\Questions;
use App\Models\Result;
use App\Models\Session;
use App\Models\Staff_bio_data;
use App\Models\Staff_subject_association;
use App\Models\Subjects;
use App\Models\Syllabus;
use App\Models\UserRole;

class SeedOtherTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administration::factory(5)->create();
        Courses::factory(4)->create();
        Curriculums::factory(4)->create();
        Departments::factory(4)->create();
        Examination::factory(4)->create();
        Informations::factory(4)->create();
        News::factory(4)->create();
        Notice_board::factory(4)->create();
        Subjects::factory(4)->create();
        Questions::factory(4)->create();
        Result::factory(4)->create();
        Session::factory(4)->create();
        Staff_subject_association::factory(4)->create();
        Staff_bio_data::factory(4)->create();
        Syllabus::factory(4)->create();
        // UserRole::factory(3)->create();
        // Registration::factory(4)->create(),

    }
}