<?php

namespace App\Services\CustomerClub;

use App\Repositories\CustomerClub\PointRepositoryInterface;
use App\Repositories\CustomerClub\ActivityTypeRepositoryInterface;

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
}
