<?php

namespace Database\Seeders;

use App\Models\Vezife;
use Illuminate\Database\Seeder;

class VezifeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vezifes = [
            'Satıcı',
            'Kreditor'
        ];

        foreach ($vezifes as $vezife)
        {
            Vezife::create([
                'ad'=>$vezife
            ]);
        }
    }
}
