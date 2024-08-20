<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserTraffic;
use Faker\Factory as Faker;

class UserTrafficSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            UserTraffic::create([
                'ip' => $faker->ipv4,
                'platform' => $faker->word,
                'device' => $faker->word,
                'browser' => $faker->word,
                'city' => $faker->city,
                'country' => $faker->country,
                'country_code' => $faker->countryCode,
                'zip_code' => $faker->postcode,
            ]);
        }
    }
}
