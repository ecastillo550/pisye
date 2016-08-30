<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('semester_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('student_class', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->primary(['student_id', 'class_id']);
            $table->softDeletes();
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
        Schema::drop('class');
        Schema::drop('student_class');
    }
}
