<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKassasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kassas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('operation_type')->default(3);
            $table->integer('operation_id');
            $table->decimal('pul',10,2);
            $table->text('description')->nullable();
            $table->boolean('system')->default(1)->comment('0 - manual, 1 - system');
            $table->integer('satici_id');
            $table->integer('relational_id')->default(0);
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
        Schema::dropIfExists('kassas');
    }
}
