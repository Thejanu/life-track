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
            'name' => "User",
            'email' => 'user@gmail.com',
            'dob' => '1990-01-01',
            'blood_group' => 'A+',
            'nic' => '200012364587',
            'password' => Hash::make('Welcome@1234'),
            'role' => 'User'
        ]);

        DB::table('medical_record_types')->insert([
            'name' => "Covid Vaccine - 1",
            'should_validate' => true,
            'details' => 'Should be completed before 2022 April 31.',
        ]);

        DB::table('medical_record_types')->insert([
            'name' => "Covid Vaccine - 2",
            'should_validate' => true,
            'details' => 'Should be completed before 2022 April 31.',
        ]);

        DB::table('medical_record_types')->insert([
            'name' => "Covid Vaccine - 3",
            'should_validate' => true,
            'details' => 'Should be completed before 2022 April 31.',
        ]);

        DB::table('medical_record_types')->insert([
            'name' => "Blood Donations",
            'should_validate' => true,
            'details' => '',
        ]);

        DB::table('medical_record_types')->insert([
            'name' => "Diabetics",
            'should_validate' => true,
            'details' => '',
        ]);

        DB::table('medical_records')->insert([
            'user_id' => 4,
            'medical_record_type_id' => 1,
            'details' => '',
            'location' => 'Colombo General Hospital',
            'date' => '2024-01-01'
        ]);
    }
}
