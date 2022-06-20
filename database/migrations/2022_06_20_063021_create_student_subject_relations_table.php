<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('subjectrelation_id')->constrained('subject_relations')->cascadeOnDelete();
            $table->foreignId('semester_id')->constrained('semesters')->cascadeOnDelete();
            $table->foreignId('session_id')->constrained('sessions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_subject_relations', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'subject_id', 'department_id', 'subjectrelation_id', 'semester_id', 'session_id']);
            $table->dropColumn(['user_id', 'subject_id', 'department_id', 'subjectrelation_id', 'semester_id', 'session_id']);
        });
        Schema::dropIfExists('student_subject_relations');
    }
};