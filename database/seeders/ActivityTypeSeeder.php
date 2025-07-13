<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityType::factory()->createMany([
            [
                'name' => 'خرید',
                'key' => 'purchase',
                'points' => 10,
                'description' => 'به ازای هر 10,000 تومان خرید'
            ],
            [
                'name' => 'تکمیل پروفایل',
                'key' => 'complete_profile',
                'points' => 50,
                'description' => 'تکمیل اطلاعات پروفایل کاربر'
            ],
            [
                'name' => 'معرفی دوست',
                'key' => 'referral',
                'points' => 100,
                'description' => 'معرفی کاربر جدید که اولین خرید را انجام دهد'
            ],
            [
                'name' => 'نظر کاربر',
                'key' => 'review',
                'points' => 20,
                'description' => 'ثبت نظر برای محصولات خریداری شده'
            ]
        ]);

        // ایجاد 5 فعالیت تصادفی دیگر
        ActivityType::factory(5)->create();
    }
}
