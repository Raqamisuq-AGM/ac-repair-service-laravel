<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create default themes for admin and frontend
        Theme::create([
            'name' => 'default',
            'type' => 'personal',
            'thumb' => 'theme_name.jpg',
            'status' => '1',
            'verified' => '1',
        ]);
    }
}
