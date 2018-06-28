<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('score');

            $table->unsignedInteger('subjID');
            $table->foreign('subjID')
            ->references('id')->on('subjects')
            ->onDelete('cascade');

            $table->string('instID');
            $table->foreign('instID')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->string('studID');
            $table->foreign('studID')
            ->references('id')->on('students')
            ->onDelete('cascade');

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
        Schema::dropIfExists('scores');
    }
}
