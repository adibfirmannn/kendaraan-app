<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create([
            'name' => 'Sopir A',
            'phone' => '081234567890',
            'license_number' => 'SIM123456',
        ]);

        Driver::create([
            'name' => 'Sopir B',
            'phone' => '089876543210',
            'license_number' => 'SIM654321',
        ]);
    }
}
