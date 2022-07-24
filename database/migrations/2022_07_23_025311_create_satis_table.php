<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis', function (Blueprint $table) {
            $table->id();
            $table->integer('satis_usulu_id')->nullable();
            $table->tinyInteger('musteri_novu')->nullable()->comment('1 - hekim, 2 - texnik, 3 - klinika, 4 -firma');
            $table->integer('musterinin_id')->nullable();
            $table->integer('satici_id')->nullable();
            $table->decimal('ilkin_odenis',10,2)->default(0);
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
        Schema::dropIfExists('satis');
    }
}
