<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Faker\Factory as Faker;

class TeamSeeder extends Seeder
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

        for ($i = 0; $i < 20; $i++) {
            // Create a fake image
            $imageName = $faker->image($uploadPath, 800, 600, null, false);

            // Save team entry
            Team::create([
                'name' => $faker->name,
                'position' => $faker->word,
                'photo' => 'uploads/img/' . $imageName,
                'description' => $faker->paragraph,
                'fb' => $faker->url,
                'twitter' => $faker->url,
                'instagram' => $faker->url,
                'whatsapp' => $faker->phoneNumber,
            ]);
        }
    }
}
