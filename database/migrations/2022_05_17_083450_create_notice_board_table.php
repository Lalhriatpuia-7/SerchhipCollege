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
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->longText('description');
            $table->dateTime('published_date');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('category_type_id')->constrained('category_types')->cascadeOnDelete();
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
        Schema::table('notice_boards', function (Blueprint $table) {

            $table->dropForeign(['category_id', 'category_type_id']);
            $table->dropColumn(['category_id', 'category_type_id']);
        });
        Schema::dropIfExists('notice_boards');
    }
};