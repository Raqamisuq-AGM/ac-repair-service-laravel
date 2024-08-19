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
        //create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01300000000',
            'password' => Hash::make('12345678'),
            'otp' => '',
        ]);
    }
}
