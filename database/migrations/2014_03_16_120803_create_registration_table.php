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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->nullable()->unique();
            $table->string('roll_no');
            $table->foreign('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreign('session_id')->constrained('sessions')->cascadeOnDelete();
            $table->foreign('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreign('semester_id')->constrained('semesters')->cascadeOnDelete();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn(['department_id']);
            $table->dropForeign(['session_id']);
            $table->dropColumn(['session_id']);
            $table->dropForeign(['subject_id']);
            $table->dropColumn(['subject_id']);
        });
        Schema::dropIfExists('registrations');
    }
};