<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'name' => 'Toyota Hilux',
            'ownership' => 'milik',
            'license_plate' => 'B1234XYZ',

        ]);

        Vehicle::create([
            'name' => 'Isuzu Elf',
            'ownership' => 'sewa',
            'license_plate' => 'B5678ABC',

        ]);
    }
}
