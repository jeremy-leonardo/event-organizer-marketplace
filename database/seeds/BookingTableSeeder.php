<?php

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking')->insert([
            [
            'user_id' => 1, 
            'city_id' => 1, 
            'event_date' => date('Y-m-d'),
            'booking_description' => 'Booking untuk pernikahan saudara saya yang bernama Antonius yang akan memiliki sekitar 100 tamu',
            ],
        ]);
    }
}
