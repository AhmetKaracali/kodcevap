<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoruTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soru_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soruID');
            $table->unsignedBigInteger('tagID');

            $table->foreign('soruID')
                ->references('id')
                ->on('sorus')
                ->onDelete('cascade');

            $table->foreign('tagID')
                ->references('id')
                ->on('etikets')
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
        Schema::dropIfExists('soru_tags');
    }
}
