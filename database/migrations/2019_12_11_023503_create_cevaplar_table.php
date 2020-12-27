<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCevaplarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cevaplar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner');
            $table->unsignedBigInteger('questionID');
            $table->text('body');
            $table->unsignedBigInteger('parent')->nullable()->default(null);
            $table->timestamp('created_at');
            $table->integer('score');
            $table->tinyInteger('isSolution')->default(0);


            $table->foreign('owner')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('questionID')
                ->references('id')
                ->on('sorus')
                ->onDelete('cascade');

            $table->foreign('parent')
                ->references('id')
                ->on('cevaplar')
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
        Schema::dropIfExists('cevaplar');
    }
}
