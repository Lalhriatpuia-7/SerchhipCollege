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
        Schema::create('toppers', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('rank');
            $table->foreignid('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignid('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignid('session_id')->constrained('sessions')->cascadeOnDelete();
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
        Schema::dropIfExists('toppers');
    }
};