<?php

namespace App\Interfaces\CustomerClub;

use App\Models\ActivityType;
use Illuminate\Support\Collection;

interface ActivityTypeRepositoryInterface
{
    /**
     * پیدا کردن نوع فعالیت بر اساس ID
     */
    public function find(int $id): ?ActivityType;

    /**
     * دریافت تمام انواع فعال فعالیت‌ها
     */
    public function allActive(): Collection;

    /**
     * ایجاد نوع فعالیت جدید
     */
    public function create(array $data): ActivityType;

    /**
     * به‌روزرسانی نوع فعالیت
     */
    public function update(int $id, array $data): bool;

    /**
     * حذف نوع فعالیت
     */
    public function delete(int $id): bool;

    /**
     * دریافت انواع فعالیت بر اساس کلید
     */
    public function findByKey(string $key): ?ActivityType;

    public function getAllActive();

    public function findById(int $id);
}
