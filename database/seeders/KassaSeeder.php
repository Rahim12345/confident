<?php

namespace Database\Seeders;

use App\Models\Kassa;
use Illuminate\Database\Seeder;
use Faker\Factory;

class KassaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0;$i<10;$i++)
        {
            $tarix = $faker->unique()->dateTimeBetween($startDate = '-2 days', $endDate = '+ 1 day');
            Kassa::create([
                'operation_id'=>rand(1,4),
                'pul'=>rand(1,100),
                'created_at'=>$tarix,
                'updated_at'=>$tarix,
            ]);
        }
    }
}
