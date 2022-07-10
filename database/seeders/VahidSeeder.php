<?php

namespace Database\Seeders;

use App\Models\Vahid;
use Illuminate\Database\Seeder;

class VahidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vahid::create([
            'ad'=>'Qutu'
        ]);
    }
}
