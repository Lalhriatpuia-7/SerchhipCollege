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
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('category_type_id')->constrained('category_types')->cascadeOnDelete();
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
        schema::table('user_types', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_type_id']);
        });
        Schema::dropIfExists('user_types');
    }
};
