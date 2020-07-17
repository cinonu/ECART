<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('other_title')->nullable();
            $table->string('foooter')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms');
    }
}
