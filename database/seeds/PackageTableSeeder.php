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
                'Bridal Suite at The Mayfair Suite for bride and groom, with an exclusive access to The Ritz-Carlton Club offering many privileges for the club guests including five continues culinary indulgence.
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
                'Bridal Suite at The Mayfair Suite for bride and groom, with an exclusive access to The Ritz-Carlton Club offering many privileges for the club guests including five continues culinary indulgence.
                Stay at The Grand Room for the parents and family, including breakfast buffet for 2 (two) persons at Asia Restaurant.
                Personalized butler for the bride and groom on the wedding day.
                Distinctively designed The Ritz–Carlton Guest Books
                Function rooms for changing rooms, tea pai/blessing ceremony and organizer
                A glass of soft drinks or iced fruit tea equals to buffet order
                A champagne glass fountain for toast including two (2) bottles of sparkling ciders',
            'package_is_active' => 1,
            ],
            [
            'vendor_id' => 3, 
            'package_name' => '2 Hour Music Package', 
            'package_price' => 9000000,
            'package_description' => 
                '',
            'package_is_active' => 1,
            ],
            [
            'vendor_id' => 4, 
            'package_name' => 'Foodie Plus Plus', 
            'package_price' => 12000000,
            'package_description' => 
                'Full Dinner catering for 500 - 1000',
            'package_is_active' => 1,
            ],
            [
            'vendor_id' => 5, 
            'package_name' => 'MAM EO Package A', 
            'package_price' => 5300000,
            'package_description' => 
                'EO Service for small to mid size event',
            'package_is_active' => 1,
            ],
        ]);
    }
}
