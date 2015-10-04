<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('cID');
            $table->string('cDescription')->nullable();
            $table->string('cName');
            $table->string('cIcon')->nullable();
            $table->tinyInteger('cIsActive');
            $table->integer('cLevel')->default(1);
            $table->integer('cParentID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
