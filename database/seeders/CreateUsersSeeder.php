<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'no_rm'=>'Admin',
               'email'=>'admin@pas.com',
                'is_admin'=>'1',
                'is_active'=>'1',
               'password'=> bcrypt('adminpas123456'),
            ],
            [
                'name'=>'Petugas',
                'no_rm'=>'Petugas',
                'email'=>'petugas@pas.com',
                 'is_admin'=>'2',
                 'is_active'=>'1',
                'password'=> bcrypt('petugaspas123456'),
             ],
            [
               'name'=>'User',
               'no_rm'=>'User',
               'email'=>'user@pas.com',
                'is_admin'=>'3',
                'is_active'=>'1',
               'password'=> bcrypt('userpas123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    
    }
}
