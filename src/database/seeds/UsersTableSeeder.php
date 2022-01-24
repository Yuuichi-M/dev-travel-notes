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
            ['name' => 'User1', 'email' => 'user1@user1.com', 'self_introduction' => 'User1です。', 'password' => Hash::make('11111111'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'User2', 'email' => 'user2@user2.com', 'self_introduction' => 'User2です。', 'password' => Hash::make('22222222'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'GUEST', 'email' => 'guest@guest.com', 'self_introduction' => 'ゲストログイン用のユーザーです。', 'password' => Hash::make('guestguest'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        DB::table('users')->insert($user);
    }
}
