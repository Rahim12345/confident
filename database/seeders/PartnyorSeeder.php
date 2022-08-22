<?php

namespace Database\Seeders;

use App\Models\Partnyor;
use Faker\Factory;
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
        $faker = Factory::create();
        for ($i=1;$i<101;$i++)
        {
            $date = $faker->dateTimeBetween('-2 weeks', 'now');
            Partnyor::create([
                'ad'=>'Firma-'.$i,
                'created_at'=>$date,
                'updated_at'=>$date
            ]);
        }
    }
}
