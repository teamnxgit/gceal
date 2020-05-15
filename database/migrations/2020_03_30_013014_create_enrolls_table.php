<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->integer('user_id')->references('id')->on('users');
            $table->string('subject_id')->references('id')->on('subjects');
            $table->boolean('approved')->default(true);
            $table->integer('approved_by')->nullable();
            $table->timestamps();
            $table->primary(['user_id','subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolls');
    }
}
