<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'avatar'=>'avatar.jpg',
            'password'=>bcrypt(12345678),
            'status'=>1
        ]);

        User::create([
            'name'=>'Rahim Süleymanov',
            'email'=>'r@mail.ru',
            'avatar'=>'avatar.jpg',
            'klinika_id'=>1,
            'vezife_id'=>1,
            'hekim_vezife_id'=>1,
            'magaza_id'=>1,
            'dogum_gunu'=>'2022-08-20',
            'password'=>bcrypt(12345678),
            'status'=>1
        ]);

        for($i=0;$i<100;$i++)
        {
            $date = $faker->dateTimeBetween('-2 weeks', 'now');
            User::create([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'avatar'=>'avatar.jpg',
                'klinika_id'=>1,
                'vezife_id'=>rand(1,2),
                'hekim_vezife_id'=>rand(1,2),
                'magaza_id'=>rand(1,5),
                'dogum_gunu'=>rand(1960,date('Y')).'08'.rand(15,25),
                'password'=>bcrypt(12345678),
                'status'=>rand(0,1),
                'created_at'=>$date,
                'updated_at'=>$date
            ]);
        }
    }
}
