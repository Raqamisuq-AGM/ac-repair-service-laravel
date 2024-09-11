<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomHeaderFooterCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('custom_header_footer_codes')->insert([
            'header_code' => '',
            'footer_code' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
