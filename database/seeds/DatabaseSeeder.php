<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CityTableSeeder::class,
            VendorTypeTableSeeder::class,
            VendorTableSeeder::class,
            UserTableSeeder::class,
            BookingStatusTableSeeder::class,
            PackageTableSeeder::class,
            BookingTableSeeder::class,
        ]);
    }
}
