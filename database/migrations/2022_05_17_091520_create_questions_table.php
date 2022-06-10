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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->integer('question_number');
            $table->string('question');
            $table->longText('answer')->nullable();
            $table->foreignId('examination_id')->constrained('examinations')->cascadeOnDelete();
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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['subject_id', 'examination_id']);
            $table->dropColumn(['subject_id', 'examination_id']);
        });
        Schema::dropIfExists('questions');
    }
};
