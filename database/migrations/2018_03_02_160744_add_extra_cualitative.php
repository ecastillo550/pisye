<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraCualitative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->integer('conduct')->unsigned()->nullable();
            $table->foreign('conduct')->references('id')->on('cualitative_grades');
            $table->integer('integration_pisye')->unsigned()->nullable();
            $table->foreign('integration_pisye')->references('id')->on('cualitative_grades');
            $table->integer('integration_college')->unsigned()->nullable();
            $table->foreign('integration_college')->references('id')->on('cualitative_grades');
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
            $table->dropColumn('conduct');
            $table->dropColumn('integration_pisye');
            $table->dropColumn('integration_college');
        });
    }
}
