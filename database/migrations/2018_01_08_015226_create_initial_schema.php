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
            $table->string('name');

            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters');

            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cualitative_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order');
            $table->softDeletes();
            $table->timestamps();
        });

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

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('users');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes');

            $table->integer('partial_id')->unsigned();
            $table->foreign('partial_id')->references('id')->on('partials');

            $table->text('comments')->nullable();

            // cuantitativas
            $table->decimal('cuantitative', 5, 2)->nullable();

            // calificaciones cualitativas
            $table->integer('participation')->unsigned();
            $table->foreign('participation')->references('id')->on('cualitative_grades');
            $table->integer('punctuality')->unsigned();
            $table->foreign('punctuality')->references('id')->on('cualitative_grades');
            $table->integer('working_disposition')->unsigned();
            $table->foreign('working_disposition')->references('id')->on('cualitative_grades');
            $table->integer('homework')->unsigned();
            $table->foreign('homework')->references('id')->on('cualitative_grades');

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
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('cualitative_grades');
        Schema::dropIfExists('partials');
        Schema::dropIfExists('grades');
    }
}
