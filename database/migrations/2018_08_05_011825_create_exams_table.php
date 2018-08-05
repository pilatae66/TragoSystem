<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->time('exam_time');
            $table->date('exam_date');
            $table->string('exam_room');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')
            ->references('id')->on('subjects')
            ->onDelete('cascade');
            $table->string('instructor_id');
            $table->foreign('instructor_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('exams');
    }
}
