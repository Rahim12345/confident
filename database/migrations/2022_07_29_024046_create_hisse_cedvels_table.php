<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHisseCedvelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hisse_cedvels', function (Blueprint $table) {
            $table->id();
            $table->integer('satis_id')->nullable();
            $table->date('odenis_tarixi');
            $table->decimal('odenilen_mebleg',10,2)->default(0);
            $table->text('serh')->nullable();
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
        Schema::dropIfExists('hisse_cedvels');
    }
}
