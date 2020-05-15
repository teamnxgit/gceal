<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('activity_id')->references('id')->in('activities');
            $table->unsignedBigInteger('unit_id')->references('id')->in('units');
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
        Schema::dropIfExists('activity_unit');
    }
}
