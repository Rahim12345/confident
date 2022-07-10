<?php

namespace Database\Seeders;

use App\Models\Magaza;
use Illuminate\Database\Seeder;

class MagazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1;$i < 6; $i++)
        {
            Magaza::create([
                'ad'=>'Anbar '.$i
            ]);
        }
    }
}
