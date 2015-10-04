<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uID');
            $table->string('uUsername');
            $table->string('uEmail');
            $table->date('uBirthday')->nullable();
            $table->string('uPassword');
            $table->string('uAvatar')->nullable();
            $table->string('uAddress')->nullable();
            $table->string('uPhone')->nullable();
            $table->date('uRegisteredDate');
            $table->tinyInteger('uIsActive');
            $table->tinyInteger('uGender')->nullable();
            $table->integer('uRole');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
