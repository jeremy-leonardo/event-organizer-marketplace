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
            ['booking_status_name' => 'Pending Confirmation'],
            ['booking_status_name' => 'Pending Payment'],
            ['booking_status_name' => 'Paid - Booking In Process'],
            ['booking_status_name' => 'Done'],
        ]);
    }
}
