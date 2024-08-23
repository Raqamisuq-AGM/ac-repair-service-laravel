<?php

namespace Database\Seeders;

use App\Models\SystemSeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class SystemSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate multiple keywords
        $keywords = [];
        for ($i = 0; $i < 3; $i++) { // Change 3 to the number of keywords you want to generate
            $keywords[] = ['value' => Str::slug($faker->word)];
        }

        // Save service entry
        SystemSeo::create([
            'meta_title' => $faker->sentence,
            'meta_keyword' => json_encode($keywords),
            'meta_desc' => $faker->paragraph(),
            'meta_author' => $faker->sentence,
            'meta_og_thumb' => 'uploads/img/bg1.jpg',
        ]);
    }
}
