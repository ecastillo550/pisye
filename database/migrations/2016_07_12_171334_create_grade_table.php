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
        Schema::create('grade', function (Blueprint $table) {
            $table->float('grade1')->nullable();
            $table->float('grade2')->nullable();
            $table->float('final')->nullable();
            $table->integer('student_id');
            $table->integer('class_id');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('class_id')->references('id')->on('class');
            $table->softDeletes();
            $table->primary(['student_id', 'class_id']);
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
        Schema::drop('grade');
    }
}
