<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToplulukFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topluluk_followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('toplulukID');
            $table->unsignedBigInteger('userID');
            $table->timestamps();


            $table->foreign('toplulukID')
                ->references('id')
                ->on('topluluks')
                ->onDelete('cascade');

            $table->foreign('userID')
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
        Schema::dropIfExists('topluluk_followers');
    }
}
