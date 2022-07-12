<?php

namespace Database\Seeders;

use App\Models\Kateqoriya;
use Illuminate\Database\Seeder;

class KateqoriyaSeeder extends Seeder
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
            Kateqoriya::create([
                'ad'=>'Kateqoriya '.$i
            ]);
        }
    }
}
