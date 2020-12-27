<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateYorumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('yorums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent')->nullable()->default(null);
            $table->unsignedBigInteger('owner');
            $table->unsignedBigInteger('postID');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('postID')
                ->references('id')
                ->on('blog_posts')
                ->onDelete('cascade');

            $table->foreign('owner')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('parent')
                ->references('id')
                ->on('yorums')
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
        Schema::dropIfExists('yorums');
    }
}
