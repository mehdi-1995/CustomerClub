<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ایجاد 50 کاربر تستی
        User::factory(50)->create();

        // ایجاد کاربر ادمین
        User::create([
            'name' => 'مدیر سیستم',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'tier_id' => 3, // سطح طلا
            'loyalty_points' => 10000,
        ]);
    }
}
