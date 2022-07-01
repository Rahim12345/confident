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
            $table->unsignedBigInteger('klinika_id');
            $table->date('dogum_gunu')->nullable();
            $table->text('elaqe')->nullable();
            $table->timestamps();

            $table->foreign('klinika_id')
                ->references('id')
                ->on('klinikas')
                ->onDelete('cascade');
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
