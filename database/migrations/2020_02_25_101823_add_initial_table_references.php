<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInitialTableReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('set null');
            $table->foreign('quarter_id')->references('id')->on('quarters')->onDelete('set null');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('set null');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['student_id']);
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['track_id']);
            $table->dropForeign(['quarter_id']);
            $table->dropForeign(['semester_id']);
            $table->dropForeign(['teacher_id']);
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
