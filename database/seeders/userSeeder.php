<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'avatar'=>'avatar.jpg',
            'klinika_id'=>1,
            'vezife_id'=>1,
            'hekim_vezife_id'=>1,
            'magaza_id'=>1,
            'password'=>bcrypt(12345678),
            'status'=>1
        ]);
    }
}
