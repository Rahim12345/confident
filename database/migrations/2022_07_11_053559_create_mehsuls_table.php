<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMehsulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mehsuls', function (Blueprint $table) {
            $table->id();
            $table->string('ad')->nullable();
            $table->integer('firma_id')->nullable();
            $table->integer('istehsalci_id')->nullable();
            $table->integer('kateqoriya_id')->nullable();
            $table->integer('marka_id')->nullable();
            $table->string('qaime_nomresi')->nullable();
            $table->date('tarix')->nullable();
            $table->integer('vahid_id')->nullable();
            $table->decimal('maya_deyeri',10,2)->default(0);
            $table->decimal('topdan_deyeri',10,2)->default(0);
            $table->decimal('nagd_deyeri',10,2)->default(0);
            $table->decimal('kredit_deyeri',10,2)->default(0);
            $table->decimal('qutudaki_1_malin_maya_deyeri',10,2)->default(0);
            $table->decimal('qutudaki_1_malin_topdan_deyeri',10,2)->default(0);
            $table->decimal('qutudaki_1_malin_nagd_deyeri',10,2)->default(0);
            $table->decimal('qutudaki_1_malin_kredit_deyeri',10,2)->default(0);
            $table->integer('say')->default(0);
            $table->integer('bir_qutusundaki_say')->default(0);
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
        Schema::dropIfExists('mehsuls');
    }
}
