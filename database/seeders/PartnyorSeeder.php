<?php

namespace Database\Seeders;

use App\Models\Partnyor;
use Illuminate\Database\Seeder;

class PartnyorSeeder extends Seeder
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
            Partnyor::create([
                'ad'=>'Firma '.$i
            ]);
        }
    }
}
