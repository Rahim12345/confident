<?php

namespace Database\Seeders;

use App\Models\Klinika;
use Illuminate\Database\Seeder;

class KlinikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klinika::create([
            'ad'=>'Mirvari diş',
            'hekim_adi'=>'Mirəflan Haşimli',
            'rayon_id'=>66
        ]);
    }
}
