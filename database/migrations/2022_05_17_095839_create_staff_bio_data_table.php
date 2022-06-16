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
        Schema::create('staff_bio_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_type_id')->constrained('user_types')->cascadeOnDelete();
            $table->string('qualification');
            $table->bigInteger('start_date');
            $table->string('rating')->nullable();
            $table->foreignId('staff_subject_association_id')->constrained('staff_subject_associations')->cascadeOnDelete();
            $table->integer('graduation_year');
            $table->longText('staff_details');
            $table->text('institution');
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
        Schema::table('staff_bio_datas', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'user_type_id', 'staff_subject_association_id']);
            $table->dropColumn(['user_id', 'user_type_id', 'staff_subject_association_id']);
        });
        Schema::dropIfExists('staff_bio_datas');
    }
};