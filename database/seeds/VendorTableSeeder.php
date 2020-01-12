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
            'vendor_type_id' => 1,
            ],
            [
            'vendor_name' => 'Retz Carl', 
            'vendor_email' => 'retzcarl@mail.com',
            'vendor_password' => bcrypt('password'),
            'vendor_phone_number' => '02464693673',
            'vendor_type_id' => 6,
            ],
            [
            'vendor_name' => 'Angger Dimas', 
            'vendor_email' => 'anggerdimas@mail.com',
            'vendor_password' => bcrypt('password'),
            'vendor_phone_number' => '08223425269',
            'vendor_type_id' => 4,
            ],
            [
            'vendor_name' => 'Medina Catering', 
            'vendor_email' => 'medinacatering@mail.com',
            'vendor_password' => bcrypt('password'),
            'vendor_phone_number' => '08252989252',
            'vendor_type_id' => 3,
            ],
            [
            'vendor_name' => 'MAM EO', 
            'vendor_email' => 'mameo@mail.com',
            'vendor_password' => bcrypt('password'),
            'vendor_phone_number' => '081532151688',
            'vendor_type_id' => 2,
            ]
        ]);
    }
}
