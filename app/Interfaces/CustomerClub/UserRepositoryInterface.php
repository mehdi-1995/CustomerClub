<?php

namespace App\Interfaces\CustomerClub;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    /**
     * دریافت لیست کاربران با صفحه‌بندی
     */
    public function paginateWithTierAndPoints(int $perPage): LengthAwarePaginator;

    /**
     * پیدا کردن کاربر با جزئیات کامل
     */
    public function findWithDetails(int $userId): User;

    /**
     * به‌روزرسانی امتیازات کاربر
     */
    public function updateLoyaltyPoints(int $userId, int $points): bool;

}
