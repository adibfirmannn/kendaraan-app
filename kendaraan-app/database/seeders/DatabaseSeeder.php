<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DriverSeeder;
use Database\Seeders\BookingSeeder;
use Database\Seeders\VehicleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DriverSeeder::class,
            VehicleSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
