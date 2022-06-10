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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('session_id')->constrained('sessions')->cascadeOnDelete();
            $table->string('event_name');
            $table->longText('description');
            $table->dateTime('event_start_date');
            $table->dateTime('event_end_date');
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
        Schema::table('curriculums', function (Blueprint $table) {

            $table->dropForeign(['session_id']);
            $table->dropColumn(['session_id']);
        });
        Schema::dropIfExists('curriculums');
    }
};