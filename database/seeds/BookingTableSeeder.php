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
            'event_date' => date('2020-04-19'),
            'booking_description' => 'Booking untuk pernikahan saudara saya yang bernama Antonius yang akan memiliki sekitar 100 tamu',
            ],
            [
            'user_id' => 2, 
            'city_id' => 1, 
            'event_date' => date('2020-06-13'),
            'booking_description' => 'Booking untuk acara perpisahan angkatan Sekolah SMPN 3 Petang, akan dihadiri sekitar 300 murid',
            ],
        ]);
    }
}
