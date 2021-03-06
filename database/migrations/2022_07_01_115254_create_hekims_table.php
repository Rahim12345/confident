<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHekimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hekims', function (Blueprint $table) {
            $table->id();
            $table->string('ad')->nullable();
            $table->unsignedBigInteger('klinika_id')->nullable();
            $table->date('dogum_gunu')->nullable();
            $table->string('tel_1')->nullable();
            $table->string('tel_2')->nullable();
            $table->string('tel_3')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('telegram')->nullable();
            $table->string('wp')->nullable();
            $table->string('email')->nullable();
            $table->integer('order_no')->default(0);
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
        Schema::dropIfExists('hekims');
    }
}
