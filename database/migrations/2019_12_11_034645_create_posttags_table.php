<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosttagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posttags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('postID');
            $table->unsignedBigInteger('tagID');
            $table->timestamps();

            $table->foreign('postID')
                ->references('id')
                ->on('blog_posts')
                ->onDelete('cascade');

            $table->foreign('tagID')
                ->references('id')
                ->on('blog_tags')
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
        Schema::dropIfExists('posttags');
    }
}
