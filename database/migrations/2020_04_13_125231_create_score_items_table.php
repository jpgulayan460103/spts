<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('subject_category_id')->nullable();
            $table->unsignedBigInteger('class_section_id')->nullable();
            $table->unsignedBigInteger('grading_system_id')->nullable();
            $table->double('item',5,2)->nullable();
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('subject_category_id')->references('id')->on('subject_categories')->onDelete('cascade');
            $table->foreign('class_section_id')->references('id')->on('class_sections')->onDelete('cascade');
            $table->foreign('grading_system_id')->references('id')->on('grading_systems')->onDelete('cascade');
        });

        Schema::table('scores', function (Blueprint $table) {
            $table->unsignedBigInteger('score_item_id')->nullable();
            $table->foreign('score_item_id')->references('id')->on('score_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scores', function (Blueprint $table) {
            $table->dropForeign(['score_item_id']);
        });
        Schema::dropIfExists('score_items');
    }
}
