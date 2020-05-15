<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('subject')->references('id')->on('subjects');
            $table->string('unit')->references('id')->on('units');
            $table->longText('question');
            $table->longText('answer');
            $table->longText('explanation');
            $table->boolean('visibility')->default(true);
            $table->integer('creator')->references('id')->on('users');
            $table->integer('helpful');
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
        Schema::dropIfExists('questions');
    }
}
