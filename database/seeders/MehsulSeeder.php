<?php

namespace Database\Seeders;

use App\Models\Mehsul;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MehsulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1;$i<=1000;$i++)
        {
            $vahid_id               = rand(1,2);
            $maya_deyeri            = rand(1,300);
            $topdan_deyeri          = $maya_deyeri     + $maya_deyeri * rand(1,10) / 100;
            $nagd_deyeri            = $topdan_deyeri   + $topdan_deyeri * rand(1,10) / 100;
            $kredit_deyeri          = $nagd_deyeri     + $nagd_deyeri * rand(1,10) / 100;
            $say                    = rand(1,100);
            $bir_qutusundaki_say    = rand(1,30);
            Mehsul::create([
                'ad'            => $faker->name,
                'firma_id'      => rand(1,100),
                'istehsalci_id' => rand(1,100),
                'kateqoriya_id' => rand(1,100),
                'marka_id'      => rand(1,100),
                'qaime_nomresi' => strtoupper($faker->domainWord),
                'tarix'         => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'vahid_id'      => $vahid_id,
                'maya_deyeri'   => $maya_deyeri,
                'topdan_deyeri' => $topdan_deyeri,
                'nagd_deyeri'   => $nagd_deyeri,
                'kredit_deyeri' => $kredit_deyeri,
                'say'           => $say,
                'qutudaki_1_malin_maya_deyeri'=>$vahid_id == 1 ? ceil($maya_deyeri / $bir_qutusundaki_say) : 0,
                'qutudaki_1_malin_topdan_deyeri'=>$vahid_id == 1 ? ceil($topdan_deyeri / $bir_qutusundaki_say) : 0,
                'qutudaki_1_malin_nagd_deyeri'=>$vahid_id == 1 ? ceil($nagd_deyeri / $bir_qutusundaki_say) : 0,
                'qutudaki_1_malin_kredit_deyeri'=>$vahid_id == 1 ? ceil($kredit_deyeri / $bir_qutusundaki_say) : 0,
                'bir_qutusundaki_say'=>$vahid_id == 1 ? $bir_qutusundaki_say : 0
            ]);
        }
    }
}
