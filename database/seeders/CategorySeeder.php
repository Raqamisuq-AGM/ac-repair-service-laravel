<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert categories related to AC servicing
        Category::create([
            'category' => 'Air Conditioners',
            'status' => 1, // or any status you prefer
        ]);

        Category::create([
            'category' => 'Cooling Fans',
            'status' => 1,
        ]);

        Category::create([
            'category' => 'Air Purifiers',
            'status' => 1,
        ]);

        Category::create([
            'category' => 'Thermostats',
            'status' => 1,
        ]);
    }
}
