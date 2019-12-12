<?php

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package')->insert([
            [
            'vendor_id' => 2, 
            'package_name' => 'The Magnifique Wedding Package', 
            'package_price' => 90000000,
            'package_description' => 
                'Cater perfectly for either an intimate wedding with only close friends and relatives as well as a majestic wedding at our Grand Ballroom, The Magnifique package features:

                Bridal Suite at The Mayfair Suite for bride and groom, with an exclusive access to The Ritz-Carlton Club offering many privileges for the club guests including five continues culinary indulgence.
                Stay at The Grand Room for the parents and family, including breakfast buffet for 2 (two) persons at Asia Restaurant.
                Personalized butler for the bride and groom on the wedding day.
                Distinctively designed The Ritz–Carlton Guest Books
                Function rooms for changing rooms, tea pai/blessing ceremony and organizer',
            'package_is_active' => 1,
            ],
            [
            'vendor_id' => 2, 
            'package_name' => 'Magic Moments Wedding Package', 
            'package_price' => 120000000,
            'package_description' => 
                'Magnificent arrangements at our Grand Ballroom, The Magic Moments package features:

                Bridal Suite at The Mayfair Suite for bride and groom, with an exclusive access to The Ritz-Carlton Club offering many privileges for the club guests including five continues culinary indulgence.
                Stay at The Grand Room for the parents and family, including breakfast buffet for 2 (two) persons at Asia Restaurant.
                Personalized butler for the bride and groom on the wedding day.
                Distinctively designed The Ritz–Carlton Guest Books
                Function rooms for changing rooms, tea pai/blessing ceremony and organizer
                A glass of soft drinks or iced fruit tea equals to buffet order
                A champagne glass fountain for toast including two (2) bottles of sparkling ciders',
            'package_is_active' => 1,
            ],
        ]);
    }
}
