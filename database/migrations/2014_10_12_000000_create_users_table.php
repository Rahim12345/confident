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
            $table->id();
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

            $table->unsignedBigInteger('klinika_id')->nullable();
            $table->unsignedBigInteger('vezife_id')->nullable();
            $table->unsignedBigInteger('hekim_vezife_id')->nullable();
            $table->unsignedBigInteger('magaza_id')->nullable();
            $table->date('dogum_gunu')->nullable();
            $table->string('tel_1')->nullable();
            $table->string('tel_2')->nullable();
            $table->string('tel_3')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('telegram')->nullable();
            $table->string('wp')->nullable();
            $table->boolean('status')->default('0')->comment('0 - don t login, 1 - login');
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
