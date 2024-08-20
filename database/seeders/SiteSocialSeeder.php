<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSocial;
use Faker\Factory as Faker;

class SiteSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $socials = [
            'Facebook' => 'facebook',
            'Twitter' => 'twitter',
            'Instagram' => 'instagram',
            'LinkedIn' => 'linkedin',
            'YouTube' => 'youtube',
        ];

        foreach ($socials as $title => $icon) {
            SiteSocial::create([
                'icon' => $icon,
                'title' => $title,
                'link' => $faker->url,
                'status' => $faker->boolean,
            ]);
        }
    }
}
