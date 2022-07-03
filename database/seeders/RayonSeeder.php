<?php

namespace Database\Seeders;

use App\Models\Rayon;
use Illuminate\Database\Seeder;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rayons = [
            'Ağdam',
            'Ağdaş',
            'Ağcabədi',
            'Ağstafa',
            'Ağsu',
            'Astara',
            'Babək',
            'Balakən',
            'Bərdə',
            'Beyləqan',
            'Biləsuvar',
            'Cəbrayıl',
            'Cəlilabad',
            'Culfa',
            'Daşkəsən',
            'Füzuli',
            'Gədəbəy',
            'Goranboy',
            'Göyçay',
            'Göygöl',
            'Hacıqabul',
            'Xaçmaz',
            'Xızı',
            'Xocalı',
            'Xocavənd',
            'İmişli',
            'İsmayıllı',
            'Kəlbəcər',
            'Kəngərli',
            'Kürdəmir',
            'Qəbələ',
            'Qax',
            'Qazax',
            'Qobustan',
            'Quba',
            'Qubadlı',
            'Qusar',
            'Laçın',
            'Lənkəran',
            'Lerik',
            'Masallı',
            'Neftçala',
            'Oğuz',
            'Ordubad',
            'Saatlı',
            'Sabirabad',
            'Sədərək',
            'Salyan',
            'Samux',
            'Şabran',
            'Şahbuz',
            'Şəki',
            'Şamaxı',
            'Şəmkir',
            'Şərur',
            'Şuşa',
            'Siyəzən',
            'Tərtər',
            'Tovuz',
            'Ucar',
            'Yardımlı',
            'Yevlax',
            'Zəngilan',
            'Zaqatala',
            'Zərdab'
        ];

        foreach ($rayons as $rayon)
        {
            Rayon::create([
                'ad'=>$rayon
            ]);
        }
    }
}
