<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->integer('order')->default(1);
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['category_type_id']);
            $table->dropColumn(['category_type_id']);
        });
        Schema::dropIfExists('categories');
    }
}