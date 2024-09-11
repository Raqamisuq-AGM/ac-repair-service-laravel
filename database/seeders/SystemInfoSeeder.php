<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('system_infos')->insert([
            [
                'title' => 'Comfort AC',
                'email' => 'admin@comfort-ac.com',
                'address' => 'Suite G04, 1 Quality Court, Chancery Lane, London, WC2A 1HR, England',
                'phone' => '+44201232045678',
                'about' => 'lorem ipsum dolor sit amet',
                'logo' => 'uploads/img/logo.png',
                'favicon' => 'uploads/img/favicon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
