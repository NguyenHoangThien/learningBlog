<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('aID');
            $table->string('aTitle');
            $table->text('aDescription')->nullable();
            $table->string('aMeta')->nullable();
            $table->text('aContent');
            $table->dateTime('aCreatedDate');
            $table->dateTime('aUpdatedDate');
            $table->string('aImage')->nullable();
            $table->string('aTag')->nullable();
            $table->integer('uID');
            $table->integer('cID');
            $table->tinyInteger('aIsActive');
            $table->integer('sortCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
