<?php

namespace Database\Seeders;

use App\Models\SatisUsulu;
use Illuminate\Database\Seeder;

class SatisUsuluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satisUsuls = [
          'Topdan',
          'Nağd',
          'Hissə-hissə',
          'Kredit'
        ];

        foreach ($satisUsuls as $satisUsul)
        {
            SatisUsulu::create([
               'ad'=>$satisUsul
            ]);
        }
    }
}
