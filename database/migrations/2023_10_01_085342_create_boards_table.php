<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('board_name'); // 게시판 이름
            $table->foreignId('user_id')->cascadeOnUpdate()->cascadeOnDelete(); // 게시판 소유자
            $table->bigInteger('parent_id'); // ->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('parent_id')->references('id')->on('boards');
        });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
