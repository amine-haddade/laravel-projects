<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'amine haddade',
                'email' => 'aminehaddede@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'nourdine elktab',
                'email' => 'nourdineelktab@example.com',
                'password' => bcrypt('password123'),
            ],
        ]);
        
    }
}
