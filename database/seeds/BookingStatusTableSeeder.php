<?php

use Illuminate\Database\Seeder;

class BookingStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_status')->insert([
            ['booking_status_name' => 'Not Paid'],
            ['booking_status_name' => 'Paid'],
            ['booking_status_name' => 'Confirmed'],
            ['booking_status_name' => 'Finished'],
            ['booking_status_name' => 'Cancelled'],
        ]);
    }
}
