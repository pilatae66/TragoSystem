<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_o_s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->integer('hours_spent');
            $table->integer('knowledge');
            $table->integer('understanding');
            $table->integer('application');
            $table->unsignedInteger('exam_id');
            $table->foreign('exam_id')
            ->references('id')->on('exams')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('t_o_s');
    }
}
