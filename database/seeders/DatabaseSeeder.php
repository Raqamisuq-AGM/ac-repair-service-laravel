<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ThemeSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            BlogSeeder::class,
            ServiceSeeder::class,
            TeamSeeder::class,
            UserTrafficSeeder::class,
            FaqSeeder::class,
            SiteSocialSeeder::class,
            SystemImageSeeder::class,
            SystemShotInfoSeeder::class,
            ContactUsMailSeeder::class,
        ]);
    }
}
