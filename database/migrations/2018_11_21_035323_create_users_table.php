<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->boolean('isAdmin');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('profile_picture'); //string link ke directory
            $table->timestamps();
            $table->rememberToken();

            //add these lines to app/providers/AppServiceProvider.php
            //add this to use lines : use Illuminate\Support\Facades\Schema;
            //under boot function   : Schema::defaultStringLength(191);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
