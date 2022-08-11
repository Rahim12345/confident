<?php

namespace Database\Seeders;

use App\Models\Marka;
use Illuminate\Database\Seeder;

class MarkaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<101;$i++)
        {
            Marka::create([
               'ad'=>'Model-'.$i
            ]);
        }
    }
}
