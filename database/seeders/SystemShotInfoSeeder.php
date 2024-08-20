<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SystemShortInfo;
use Faker\Factory as Faker;

class SystemShotInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        SystemShortInfo::create([
            'email' => $faker->companyEmail,
            'phone' => $faker->phoneNumber,
            'whatsapp' => $faker->phoneNumber, // Fake phone number for WhatsApp
            'address' => $faker->address,
        ]);
    }
}
