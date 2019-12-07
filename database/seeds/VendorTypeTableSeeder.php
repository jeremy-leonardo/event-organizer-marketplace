<?php

use Illuminate\Database\Seeder;

class VendorTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor_type')->insert([
            ['vendor_type_name' => '-'],
            ['vendor_type_name' => 'Event Organizer'],
            ['vendor_type_name' => 'Catering'],
            ['vendor_type_name' => 'Music'],
            ['vendor_type_name' => 'Decoration'],
            ['vendor_type_name' => 'Building and Venue Provider'],
        ]);
    }
}
