<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->integer('sectionId')->unsigned();
            $table->foreign('sectionId')->references('id')->on('sections');
            $table->string('name');
            $table->text('content');
            $table->boolean('open')->default('true');
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
        Schema::dropIfExists('threads', function(Blueprint $table) {
            $table->dropForeign('threads_userId_foreign');
            $table->dropForeign('threads_sectionId_foreign');
        });
    }
}
