<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // ایجاد 200 رکورد امتیاز تصادفی
        Point::factory(200)->create();
    }
}
