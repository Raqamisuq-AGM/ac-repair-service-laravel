<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve the category IDs
        $airConditionersId = Category::where('category', 'Air Conditioners')->first()->id;
        $coolingFansId = Category::where('category', 'Cooling Fans')->first()->id;
        $airPurifiersId = Category::where('category', 'Air Purifiers')->first()->id;
        $thermostatsId = Category::where('category', 'Thermostats')->first()->id;

        // Insert subcategories related to each category
        SubCategory::create([
            'category_id' => $airConditionersId,
            'sub_category' => 'Window AC',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $airConditionersId,
            'sub_category' => 'Split AC',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $coolingFansId,
            'sub_category' => 'Ceiling Fans',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $coolingFansId,
            'sub_category' => 'Table Fans',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $airPurifiersId,
            'sub_category' => 'HEPA Air Purifiers',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $airPurifiersId,
            'sub_category' => 'Activated Carbon Air Purifiers',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $thermostatsId,
            'sub_category' => 'Smart Thermostats',
            'status' => 1,
        ]);

        SubCategory::create([
            'category_id' => $thermostatsId,
            'sub_category' => 'Manual Thermostats',
            'status' => 1,
        ]);
    }
}
