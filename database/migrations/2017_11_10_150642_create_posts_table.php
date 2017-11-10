<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('sectionId')->unsigned();
            $table->foreign('sectionId')->references('id')->on('sections');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->text('content')->notnull();
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
        Schema::dropIfExists('posts', function(Blueprint $table) {
            $table->dropForeign('posts_sectionId_foreign');
            $table->dropForeign('posts_userId_foreign');
        });
    }
}
