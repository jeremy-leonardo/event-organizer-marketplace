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
        DB::table('city')->insert([
            ['city_name' => '-'],
            ['city_name' => 'Jakarta'],
            ['city_name' => 'Bandung'],
            ['city_name' => 'Bogor'],
        ]);
    }
}
