<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('post_title');
            $table->string('post_content');
            $table->foreignId('user_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('post_views');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('boards');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
