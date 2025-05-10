<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        if (!User::where('email', 'admin@embeko.ac.tz')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@embeko.ac.tz',
                'password' => Hash::make('password'),
            ]);
        }

        // Create additional users if needed
        if (!User::where('email', 'content@embeko.ac.tz')->exists()) {
            User::create([
                'name' => 'Content Manager',
                'email' => 'content@embeko.ac.tz',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
