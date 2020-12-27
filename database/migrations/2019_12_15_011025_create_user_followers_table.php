<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('followed');
            $table->unsignedBigInteger('follower');
            $table->dateTime('date');

            $table->foreign('followed')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('follower')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_followers');
    }
}
