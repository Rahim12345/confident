<?php

namespace Database\Seeders;

use App\Models\HekimVezife;
use Illuminate\Database\Seeder;

class HekimVezifeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vezifes = [
            'Həkim',
            'Texnik'
        ];

        foreach ($vezifes as $vezife)
        {
            HekimVezife::create([
                'ad'=>$vezife
            ]);
        }
    }
}
