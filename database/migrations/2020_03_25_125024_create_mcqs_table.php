<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcqs', function (Blueprint $table) {
            $table->integer('id');
            $table->string('subject')->references('id')->on('subjects');
            $table->string('unit')->references('id')->on('units');
            $table->longText('question');
            $table->longText('answer_1');
            $table->longText('answer_2');
            $table->longText('answer_3');
            $table->longText('answer_4');
            $table->longText('answer_5');
            $table->tinyInteger('correct_answer');
            $table->longText('explanation')->nullable();
            $table->string('note')->nullable();
            $table->boolean('visibility')->default(true);
            $table->integer('creator')->references('id')->on('users');
            $table->integer('helpful')->default(0);
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcqs');
    }
}
