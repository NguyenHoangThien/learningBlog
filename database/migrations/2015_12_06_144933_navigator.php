<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Navigator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigator', function (Blueprint $table) {
            $table->increments('navID');
            $table->string('navName');
            $table->string('navUrl')->nullable();
            $table->tinyInteger('navActive')->nullable();
            $table->integer('navSortCode')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
