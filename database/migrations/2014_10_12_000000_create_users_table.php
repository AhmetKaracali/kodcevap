<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',
            function (Blueprint $table) {
                $table->bigIncrements('id')->unique();
                $table->string('username')->unique();
                $table->string('name');
                $table->unsignedBigInteger('points')->default(0);
                $table->timestamp('regDate');
                $table->string('about')->nullable()->default(null);
                $table->string('konum')->nullable()->default(null);
                $table->string('ppURL')->default('/images/defaultpp.jpg');
                $table->string('userCover')->default('/images/defaultcover.jpg');
                $table->date('birthdate');
                $table->integer('cinsiyet')->nullable()->default(null);
                $table->string('facebookURL')->nullable()->default(null);
                $table->string('instagramURL')->nullable()->default(null);
                $table->string('twitterURL')->nullable()->default(null);
                $table->string('linkedinURL')->nullable()->default(null);

                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable()->default(null);
                $table->string('password');
                $table->integer('modRate')->default(1);
                $table->rememberToken();

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
