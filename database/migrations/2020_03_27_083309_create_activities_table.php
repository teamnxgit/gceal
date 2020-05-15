<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('title');
            $table->longText('description');
            $table->time('duration')->nullable();
            $table->dateTime('expiry')->nullable();
            $table->integer('atempt_limit')->default(0);
            $table->string('subject')->references('id')->on('subjects');
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
        Schema::dropIfExists('activities');
    }
}
