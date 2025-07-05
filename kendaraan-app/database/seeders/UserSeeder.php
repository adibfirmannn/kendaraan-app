<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Approver 1',
            'email' => 'approver1@demo.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);

        User::create([
            'name' => 'Approver 2',
            'email' => 'approver2@demo.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);
    }
}
