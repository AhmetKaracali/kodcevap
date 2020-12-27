<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSorusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorus', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('toplulukID')->nullable();
            $table->string('title');
            $table->text('body');
            $table->string('slug');
            $table->unsignedBigInteger('owner');
            $table->timestamp('crdate');
            $table->bigInteger('vote')->default(0);
            $table->unsignedBigInteger('views')->default(0);
            $table->tinyInteger('solved')->default(0);

            $table->foreign('toplulukID')
                ->references('id')
                ->on('topluluks')
                ->onDelete('cascade');

            $table->foreign('owner')
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
        Schema::dropIfExists('sorus');
    }
}
