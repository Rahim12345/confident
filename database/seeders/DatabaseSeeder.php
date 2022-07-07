<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            userSeeder::class,
            MagazaSeeder::class,
            VezifeSeeder::class,
            HekimVezifeSeeder::class,
            SeherSeeder::class,
            RayonSeeder::class,
            KlinikaSeeder::class,
        ]);
    }
}
