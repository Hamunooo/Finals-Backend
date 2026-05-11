<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Delete existing users
        User::query()->delete();

        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@cartify.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'Customer User',
            'email' => 'user@cartify.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
