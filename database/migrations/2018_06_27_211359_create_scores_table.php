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
            $table->string('scoreType');
            $table->unsignedInteger('exam_id');
            $table->foreign('exam_id')
            ->references('id')->on('exams')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('student_id');
            $table->foreign('student_id')
            ->references('id')->on('students')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
