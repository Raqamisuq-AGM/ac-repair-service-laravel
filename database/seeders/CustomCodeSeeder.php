<?php

namespace Database\Seeders;

use App\Models\CustomCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomCode::create([
            'header' => '',
            'footer' => '',
        ]);
    }
}
