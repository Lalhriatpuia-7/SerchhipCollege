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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('examination_id')->constrained('examinations')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_type_id')->constrained('user_types')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('session_id')->constrained('sessions')->cascadeOnDelete();
            $table->float('internal_mark_scored');
            $table->float('external_mark_scored');
            // $table->float('total_mark_scored');
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
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['examination_id', 'user_id', 'user_type_id', 'subject_id', 'department_id', 'session_id']);
            $table->dropColumn(['examination_id', 'user_id', 'user_type_id', 'subject_id', 'department_id', 'session_id']);
        });
        Schema::dropIfExists('results');
    }
};