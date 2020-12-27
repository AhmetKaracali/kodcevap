<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('reported_at');
            $table->unsignedBigInteger('reporterUser');
            $table->unsignedBigInteger('reportedUser');
            $table->integer('reportType');
            $table->unsignedBigInteger('contentID');

            $table->foreign('reporterUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('reportedUser')
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
        Schema::dropIfExists('reporteds');
    }
}
