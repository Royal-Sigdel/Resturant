<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::Create([
            'name'=> 'Royal Sigdel',
            'email'=> 'rsigdel@gmail.com',
            'password'=>'password20',
        ]);
    }
}
