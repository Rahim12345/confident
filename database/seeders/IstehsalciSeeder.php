<?php

namespace Database\Seeders;

use App\Models\Istehsalci;
use Illuminate\Database\Seeder;

class IstehsalciSeeder extends Seeder
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
            Istehsalci::create([
                'ad'=>'İstehsalçı '.$i,
                'olke'=>'Ölkə '.rand(1,5),
            ]);
        }
    }
}
