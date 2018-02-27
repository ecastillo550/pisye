<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCualitativeOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->integer('manual_dexterity')->unsigned()->nullable();
            $table->foreign('manual_dexterity')->references('id')->on('cualitative_grades');
            $table->integer('material_selection')->unsigned()->nullable();
            $table->foreign('material_selection')->references('id')->on('cualitative_grades');
            $table->integer('instructions')->unsigned()->nullable();
            $table->foreign('instructions')->references('id')->on('cualitative_grades');
            $table->integer('concentration')->unsigned()->nullable();
            $table->foreign('concentration')->references('id')->on('cualitative_grades');
            $table->integer('problem_resolution')->unsigned()->nullable();
            $table->foreign('problem_resolution')->references('id')->on('cualitative_grades');

            $table->integer('hygiene')->unsigned()->nullable();
            $table->foreign('hygiene')->references('id')->on('cualitative_grades');
            $table->integer('presentation')->unsigned()->nullable();
            $table->foreign('presentation')->references('id')->on('cualitative_grades');
            $table->integer('cleanliness')->unsigned()->nullable();
            $table->foreign('cleanliness')->references('id')->on('cualitative_grades');
            $table->integer('integration')->unsigned()->nullable();
            $table->foreign('integration')->references('id')->on('cualitative_grades');
            $table->integer('absence')->nullable();

            $table->integer('teamwork')->unsigned()->nullable();
            $table->foreign('teamwork')->references('id')->on('cualitative_grades');
            $table->integer('initiative')->unsigned()->nullable();
            $table->foreign('initiative')->references('id')->on('cualitative_grades');
            $table->integer('decision_making')->unsigned()->nullable();
            $table->foreign('decision_making')->references('id')->on('cualitative_grades');
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->boolean('hide_title')->default(false);
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
            $table->dropColumn('manual_dexterity');
            $table->dropColumn('material_selection');
            $table->dropColumn('instructions');
            $table->dropColumn('concentration');
            $table->dropColumn('problem_resolution');
            $table->dropColumn('hygiene');
            $table->dropColumn('presentation');
            $table->dropColumn('cleanliness');
            $table->dropColumn('integration');
            $table->dropColumn('absence');
            $table->dropColumn('teamwork');
            $table->dropColumn('initiative');
            $table->dropColumn('decision_making');
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('hide_title');
        });
    }
}
