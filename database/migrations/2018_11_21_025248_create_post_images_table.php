<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post__images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('caption', 100);
            $table->integer('category_id')->references('id')->on('categories');
            $table->integer('owner_id')->references('id')->on('users'); //user
            $table->integer('price');
            $table->string('picture'); //string link ke directory
            //$table->binary('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post__images');
    }
}
