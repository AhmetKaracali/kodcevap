<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('postID');
            $table->unsignedBigInteger('catID');
            $table->timestamps();

            $table->foreign('postID')
                ->references('id')
                ->on('blog_posts')
                ->onDelete('cascade');

            $table->foreign('catID')
                ->references('id')
                ->on('blog_categories')
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
        Schema::dropIfExists('postcategories');
    }
}
