<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactUsMail;
use Faker\Factory as Faker;

class ContactUsMailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate fake contact us messages
        for ($i = 0; $i < 20; $i++) {
            ContactUsMail::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'subject' => $faker->sentence,
                'phone' => $faker->phoneNumber,
                'message' => $faker->paragraph,
                'status' => $faker->boolean,
            ]);
        }
    }
}
