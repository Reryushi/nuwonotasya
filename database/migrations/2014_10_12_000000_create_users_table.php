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
            $table->string('name', 25)->nullable();
            $table->string('nik', 25)->unique();
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->string('phone', 15)->nullable();
            // $table->text('address')->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->string('password', 200)->nullable();
            // $table->string('avatar', 200)->nullable();
            // $table->string('about', 300)->nullable();
            // $table->string('facebook_id', 191)->unique()->nullable();
            // $table->string('twitter_id', 191)->unique()->nullable();
            // $table->string('google_id', 191)->unique()->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->boolean('status')->default(true);
            $table->rememberToken();
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
    }
}
