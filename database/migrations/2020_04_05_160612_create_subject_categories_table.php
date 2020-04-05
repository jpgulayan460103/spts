<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullabe();
            $table->timestamps();
        });
        Schema::table('grading_systems', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_category_id')->nullable();
            $table->foreign('subject_category_id')->references('id')->on('subject_categories')->onDelete('cascade');
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_category_id')->nullable();
            $table->foreign('subject_category_id')->references('id')->on('subject_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['subject_category_id']);
        });
        Schema::table('grading_systems', function (Blueprint $table) {
            $table->dropForeign(['subject_category_id']);
        });
        Schema::dropIfExists('subject_categories');
    }
}
