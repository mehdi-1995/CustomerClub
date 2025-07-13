<?php

namespace Database\Seeders;

use App\Models\TierHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TierHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ایجاد 50 رکورد تاریخچه تغییر سطح
        TierHistory::factory(50)->create();
    }
}
