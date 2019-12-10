<?php

use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
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
            'vendor_password' => bcrypt('password'),
            'vendor_phone_number' => '0235243242',
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'vendor_name' => 'Retz Carl', 
            'vendor_email' => 'retzcarl@mail.com',
            'vendor_password' => bcrypt('password'),
            'vendor_phone_number' => '02464693673',
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
