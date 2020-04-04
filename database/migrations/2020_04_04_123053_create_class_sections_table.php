<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_name');
            $table->string('section_strand');
            $table->string('section_adviser');
            $table->string('grade_level');
            $table->timestamps();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('class_section_id')->nullable();
            $table->foreign('class_section_id')->references('id')->on('class_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_sections');
    }
}
