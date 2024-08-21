<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Faker\Factory as Faker;


class ServiceSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create directories if they do not exist
        $uploadPath = public_path('uploads/img');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Get existing categories and subcategories
        $categories = Category::all();
        $subCategories = SubCategory::all();

        for ($i = 0; $i < 20; $i++) {
            // Create a fake image
            $imageName = $faker->image($uploadPath, 800, 600, null, false);

            // Randomly select a category and a subcategory
            $category = $categories->random();
            $subCategory = $subCategories->where('category_id', $category->id)->random();

            // Save service entry
            Service::create([
                'title' => $faker->sentence,
                'short_title' => $faker->word,
                'icon' => 'icon-' . $faker->word,
                'short_icon' => 'icon-short-' . $faker->word,
                'position' => $i + 1,
                'cover_photo' => 'uploads/img/' . $imageName,
                'desc' => $faker->paragraph,
                'short_desc' => $faker->sentence,
                'category' => $category->category,
                'sub_category' => $subCategory->sub_category,
                'tags' => implode(', ', $faker->words(3)),
                'meta_title' => $faker->sentence,
                'meta_keyword' => implode(', ', $faker->words(3)),
                'meta_desc' => $faker->paragraph,
                'meta_author' => $faker->name,
                'meta_tags' => implode(', ', $faker->words(3)),
                'meta_og_thumb' => 'uploads/img/' . $imageName,
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
