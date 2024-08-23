<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create directories if they do not exist
        // $uploadPath = public_path('uploads/img');
        // if (!file_exists($uploadPath)) {
        //     mkdir($uploadPath, 0777, true);
        // }

        for ($i = 0; $i < 20; $i++) {
            // Create a fake image
            // $imageName = $faker->image($uploadPath, 800, 600, null, false);

            // Save team entry
            Team::create([
                'name' => $faker->name,
                'slug' => Str::slug($faker->name),
                'position' => $faker->word,
                'photo' => 'uploads/img/team1-1.jpg',
                'description' => $faker->paragraph,
                'fb' => 'https://www.facebook.com/user',
                'twitter' => 'https://www.x.com/user',
                'instagram' => 'https://www.instagram.com/user',
                'whatsapp' => 'https://wa.me/552196312XXXX',
            ]);
        }
    }
}
