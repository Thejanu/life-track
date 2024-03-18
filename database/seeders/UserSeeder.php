<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Manager",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Welcome@1234'),
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => "Doctor",
            'email' => 'staff@gmail.com',
            'password' => Hash::make('Welcome@1234'),
            'role' => 'Staff'
        ]);

        DB::table('users')->insert([
            'name' => "Integration",
            'email' => 'integration@gmail.com',
            'password' => Hash::make('Welcome@1234'),
            'role' => 'Integration'
        ]);

        DB::table('users')->insert([
            'name' => "Wildlife Staff Member",
            'email' => 'user@gmail.com',
            'password' => Hash::make('Welcome@1234'),
            'role' => 'User'
        ]);
    }
}
