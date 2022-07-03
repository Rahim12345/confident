<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlinikasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klinikas', function (Blueprint $table) {
            $table->id();
            $table->string('ad')->nullable();
            $table->string('hekim_adi')->nullable()->comment('Ola bilər ki rayonda klinikaya deyil birbaşa həkimin özünə məhsul verilsin');
            $table->string('kuce_adi')->nullable();
            $table->text('xerite')->nullable();
            $table->string('tel_1')->nullable();
            $table->string('tel_2')->nullable();
            $table->string('tel_3')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('telegram')->nullable();
            $table->string('wp')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('rayon_id');
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
        Schema::dropIfExists('klinikas');
    }
}
