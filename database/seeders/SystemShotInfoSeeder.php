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
            'company_name' => "Lorem Ipsum",
            'tagline' => "Lorem Ipsum",
            'email' => $faker->companyEmail,
            'phone' => $faker->phoneNumber,
            'whatsapp' => $faker->phoneNumber,
            'address' => $faker->address,
        ]);
    }
}
