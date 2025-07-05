<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Driver;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $approver1 = User::where('email', 'approver1@demo.com')->first();
        $approver2 = User::where('email', 'approver2@demo.com')->first();
        $vehicle = Vehicle::first();
        $driver = Driver::first();

        Booking::create([
            'user_id' => $admin->id,
            'vehicle_id' => $vehicle->id,
            'driver_id' => $driver->id,
            'approver_lvl_1' => $approver1->id,
            'approver_lvl_2' => $approver2->id,
            'start_time' => Carbon::now()->addDays(1),
            'end_time' => Carbon::now()->addDays(2),
            'status' => 'pending',
        ]);
    }
}
