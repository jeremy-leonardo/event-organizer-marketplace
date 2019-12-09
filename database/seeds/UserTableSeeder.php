<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
            'user_name' => 'User01', 
            'user_email' => 'user@mail.com',
            'user_password' => bcrypt('password'),
            'user_phone_number' => '0234273242',
            ],
            [
            'user_name' => 'Jeremy Leonardo', 
            'user_email' => 'jeremy_leonardo@mail.com',
            'user_password' => bcrypt('password'),
            'user_phone_number' => '0234243242',
            ],
            [
            'user_name' => 'Jeremy', 
            'user_email' => 'jeremy@mail.com',
            'user_password' => bcrypt('password'),
            'user_phone_number' => '02374243242',
            ],
        ]);
    }
}
