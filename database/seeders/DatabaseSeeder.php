<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use App\Models\Tier;
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
            TierSeeder::class,
            ActivityTypeSeeder::class,
            UserSeeder::class,
            PointSeeder::class,
            TierHistorySeeder::class,
        ]);

    }


}
