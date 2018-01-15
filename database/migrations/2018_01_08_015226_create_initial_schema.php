<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('semesters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters');

            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cualitative_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('users');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes');

            // calificaciones cuantitativas
            $table->decimal('period_1', 5, 2);
            $table->decimal('period_1', 5, 2);
            $table->decimal('period_final', 5, 2);

            // calificaciones cualitativas
            $table->integer('responsability')->unsigned();
            $table->foreign('responsability')->references('id')->on('cualitative_grades');

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
        //
    }
}
