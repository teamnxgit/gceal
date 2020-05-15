<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->Integer('id')->primary();
            $table->String('about');
            $table->date('dob');
            $table->String('studied_at');
            $table->String('higher_studies');
            $table->String('graduated_at');
            $table->Integer('graduated_in');
            $table->String('work_place');
            $table->String('work_designation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
