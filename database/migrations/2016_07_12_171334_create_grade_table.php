<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order');
            $table->integer('is_final')->default(false);

            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->float('cuantitative')->nullable();
            $table->integer('participation')->nullable();
            $table->integer('punctuality')->nullable();
            $table->integer('working_disposition')->nullable();
            $table->integer('homework')->nullable();
            $table->text('comments')->nullable();

            $table->integer('partial_id')->unsigned();
            $table->foreign('partial_id')->references('id')->on('partials');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes');

            $table->unique(['student_id', 'class_id', 'partial_id']);
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
        Schema::drop('partials');
        Schema::drop('grades');
    }
}
