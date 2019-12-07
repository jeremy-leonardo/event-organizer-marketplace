<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor')->insert([
            [
            'vendor_name' => 'Vendor01', 
            'vendor_email' => 'vendor@mail.com',
            'vendor_password' => 'password',
            'vendor_phone_number' => '0235243242',
            ]
        ]);
    }
}
