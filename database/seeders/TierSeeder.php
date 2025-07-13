<?php

namespace Database\Seeders;

use App\Models\Tier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tier::factory()->createMany([
            [
                'name' => 'برنز',
                'color_code' => '#cd7f32',
                'min_points' => 0,
                'max_points' => 1000,
                'benefits' => 'تخفیف ۵٪ در خریدها'
            ],
            [
                'name' => 'نقره',
                'color_code' => '#c0c0c0',
                'min_points' => 1001,
                'max_points' => 5000,
                'benefits' => 'تخفیف ۱۰٪ در خریدها + ارسال رایگان'
            ],
            [
                'name' => 'طلا',
                'color_code' => '#ffd700',
                'min_points' => 5001,
                'max_points' => null,
                'benefits' => 'تخفیف ۱۵٪ در خریدها + ارسال رایگان + هدیه ویژه'
            ]
        ]);
    }
}
