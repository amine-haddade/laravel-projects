<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password'), 'type' => 'admin'],
            ['name' => 'Manager', 'email' => 'manager@example.com', 'password' => bcrypt('password'), 'type' => 'manager'],
            ['name' => 'User', 'email' => 'user@example.com', 'password' => bcrypt('password'), 'type' => 'user'],
        ]);
    }
}

