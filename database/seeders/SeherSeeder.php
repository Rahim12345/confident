<?php

namespace Database\Seeders;

use App\Models\Seher;
use Illuminate\Database\Seeder;

class SeherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sehers = [
            'Bakı',
            'Gəncə'
        ];

        foreach ($sehers as $seher)
        {
            Seher::create([
                'ad'=>$seher
            ]);
        }
    }
}
