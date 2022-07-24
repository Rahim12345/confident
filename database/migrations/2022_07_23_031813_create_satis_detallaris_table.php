<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisDetallarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis_detallaris', function (Blueprint $table) {
            $table->id();
            $table->integer('satis_id')->nullable();
            $table->integer('mehsul_id')->nullable();
            $table->integer('qutu_sayi')->default(0)
                ->comment('Bu kolonda yalnız qutu ilə satılan məhsulların sayı yazılır');
            $table->decimal('qutusunun_cari_qiymeti',10,2)->default(0)
                ->comment('Bu kolonda yalnız qutu ilə satılan məhsulların qiyməti yazılır');
            $table->decimal('qutusunun_faktiki_satildigi_qiymet',10,2)->default(0)
                ->comment('Bu kolonda yalnız qutu ilə satılan məhsulların qiyməti yazılır');

            $table->integer('satis_miqdari_ededle')->default(0)
                ->comment('Bu kolonda həm ədədlə, həm də qutu ilə məhsul satılarkən məhsulun sayı yazıla bilər');
            $table->decimal('bir_ededinin_cari_qiymeti',10,2)->default(0)
                ->comment('Bu kolonda həm ədədlə, həm də qutu ilə məhsul satılarkən məhsulun qiyməti yazıla bilər');
            $table->decimal('bir_ededinin_faktiki_satildigi_qiymeti',10,2)->default(0)
                ->comment('Bu kolonda həm ədədlə, həm də qutu ilə məhsul satılarkən məhsulun qiyməti yazıla bilər');
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
        Schema::dropIfExists('satis_detallaris');
    }
}
