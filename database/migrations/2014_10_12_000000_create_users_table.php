<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('user_account',50);
            $table->string('user_pw',200);
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_name',50);
            $table->string('post_class',10);
            $table->string('post_content',200);
            $table->timestamps();
        });
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('reply_name',50);
            $table->string('reply_content',200);
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('replies');
    }
}
