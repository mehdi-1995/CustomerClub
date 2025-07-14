<?php

namespace App\Services\CustomerClub;

use App\Interfaces\CustomerClub\TierRepositoryInterface;

class TierService
{
    public function __construct(
        private TierRepositoryInterface $tierRepository
    ) {}

    /**
     * دریافت سطح کاربر با اطلاعات پیشرفت به سطح بعدی
     */
    public function getUserTierWithProgress(int $userId): array
    {
        $userPoints = $this->tierRepository->getUserPoints($userId);
        $currentTier = $this->tierRepository->findTierForPoints($userPoints);
        $nextTier = $this->tierRepository->getNextTier($currentTier->id);

        return [
            'current' => $currentTier,
            'next' => $nextTier,
            'progress' => $nextTier
                ? ($userPoints - $currentTier->min_points) /
                  ($nextTier->min_points - $currentTier->min_points) * 100
                : 100,
            'remaining_points' => $nextTier
                ? $nextTier->min_points - $userPoints
                : 0
        ];
    }
}
