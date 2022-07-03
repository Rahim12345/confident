<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIscisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iscis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('magaza_id')->nullable();
            $table->unsignedBigInteger('vezife_id')->nullable();
            $table->string('ad')->nullable();
            $table->string('email');
            $table->string('password');
            $table->date('dogum_gunu')->nullable();
            $table->string('tel_1')->nullable();
            $table->string('tel_2')->nullable();
            $table->string('tel_3')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('telegram')->nullable();
            $table->string('wp')->nullable();
//            $table->string('email')->nullable();
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
        Schema::dropIfExists('iscis');
    }
}
