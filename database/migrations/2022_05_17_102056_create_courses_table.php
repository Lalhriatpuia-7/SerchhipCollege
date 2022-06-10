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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->longText('description');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('category_type_id')->constrained('category_types')->cascadeOnDelete();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['category_id', 'category_type']);
            $table->dropColumn(['category_id', 'category_type']);
        });
        Schema::dropIfExists('courses');
    }
};
