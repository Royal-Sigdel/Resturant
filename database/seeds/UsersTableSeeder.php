<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::Create([
            'name'=> 'Royal Sigdel',
            'email'=> 'rsigdel@gmail.com',
            'password'=>Hash::make('password20'),
        ]);
        $user->table_list()->create([
            'name' => 'Table no. 1',

        ]);
        $user->table_list()->create([
            'name' => 'Table no.2',

        ]);
        $user->table_list()->create([
            'name' => 'Table no. 3',
        ]);
    }
}