<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SystemImage;
use Faker\Factory as Faker;

class SystemImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create fake images for logo and favicon
        $images = [
            ['type' => 'logo', 'file' => 'logo.png'],
            ['type' => 'favicon', 'file' => 'favicon.png'],
        ];

        foreach ($images as $image) {
            SystemImage::create([
                'type' => $image['type'],
                'file' => $image['file'],
                'status' => $faker->boolean,
            ]);
        }
    }
}
