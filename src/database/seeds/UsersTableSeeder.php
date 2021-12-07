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
        $user = [
            ['name' => 'yuuichi', 'email' => 'yuuichi@yuuichi.com', 'password' => Hash::make('11111111'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'mizuta', 'email' => 'mizuta@mizuta.com', 'password' => Hash::make('22222222'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'GUEST', 'email' => 'guest@guest.com', 'password' => Hash::make('guestguest'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        DB::table('users')->insert($user);
    }
}
