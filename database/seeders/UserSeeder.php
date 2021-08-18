<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = [
            [
                'username' => 'ali',
                'name' => 'ali',
                'email' => 'ali@gmail.com',
                'password' => bcrypt('ali'),
                'role' => 'Master Admin'
            ],
            [
                'username' => 'mulekjurisek',
                'name' => 'Mulek Jurisek',
                'email' => 'mulekjurisek@gmail.com',
                'password' => bcrypt('mulekjurisek'),
                'role' => 'Admin'
            ],
            [
                'username' => 'ina',
                'name' => 'ina',
                'email' => 'ina@gmail.com',
                'password' => bcrypt('ina'),
                'role' => 'Manager'
            ]
        ];
        foreach($user as $key => $value){
            User::create($value);

        }
    }
}
