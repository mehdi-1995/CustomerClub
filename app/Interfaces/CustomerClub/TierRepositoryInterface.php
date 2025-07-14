<?php

namespace App\Interfaces\CustomerClub;

use App\Models\Tier;
use Illuminate\Support\Collection;

interface TierRepositoryInterface
{
    /**
     * دریافت تمام سطوح
     */
    public function all(): Collection;

    /**
     * پیدا کردن سطح مناسب بر اساس امتیاز
     */
    public function findTierForPoints(int $points): ?Tier;

    /**
     * دریافت سطح پیش‌فرض
     */
    public function getDefaultTier(): Tier;

    public function getUserPoints(int $userId): int;

    public function getNextTier(int $currentTierId);
}
