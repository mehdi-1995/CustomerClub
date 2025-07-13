<?php

namespace App\Interfaces\CustomerClub;

use App\Models\Point;
use Illuminate\Support\Collection;

interface PointRepositoryInterface
{
    /**
     * ایجاد رکورد امتیاز جدید
     */
    public function create(array $data): Point;

    /**
     * دریافت امتیازات یک کاربر
     */
    public function getUserPoints(int $userId): Collection;

    /**
     * دریافت مجموع امتیازات قابل استفاده کاربر
     */
    public function getAvailablePointsSum(int $userId): int;
}
