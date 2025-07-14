<?php

namespace App\Services\CustomerClub;

use App\Interfaces\CustomerClub\ActivityTypeRepositoryInterface;
use App\Interfaces\CustomerClub\PointRepositoryInterface;

class PointService
{
    public function __construct(
        private PointRepositoryInterface $pointRepository,
        private ActivityTypeRepositoryInterface $activityTypeRepository
    ) {}

    public function addPointsToUser($userId, array $data)
    {
        $activity = $this->activityTypeRepository->find($data['activity_type_id']);
        $points = $data['amount'] ?? $activity->points;

        return $this->pointRepository->create([
            'user_id' => $userId,
            'activity_type_id' => $activity->id,
            'amount' => $points,
            'notes' => $data['notes'] ?? null
        ]);
    }

    public function getUserPointsHistory(int $userId, int $perPage = 10)
    {
        return $this->pointRepository->getUserPointsHistory($userId, $perPage);
    }
}
