<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('themes')->insert([
            [
                'name' => 'Default',
                'thumbnail' => 'thumbnail.jpg',
                'short_desc' => 'This is the default theme for the application.',
                'raqamisuq_email' => 'default@themes.com',
                'raqamisuq_license_code' => 'LIC12345DEF',
                'status' => 1,
                'verified' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
