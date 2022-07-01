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
            $table->unsignedBigInteger('rayon_id');
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
