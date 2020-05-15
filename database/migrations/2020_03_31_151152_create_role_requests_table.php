<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->refrences('id')->in('users');
            $table->string('role');
            $table->string('status');
            $table->integer('approved_by')->refereces('id')->in('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('role_requests');
    }
}
