<?php

namespace App\Services\CustomerClub;

use App\Interfaces\CustomerClub\ActivityServiceInterface;
use App\Interfaces\CustomerClub\ActivityTypeRepositoryInterface;

class ActivityService implements ActivityServiceInterface
{
    public function __construct(
        private ActivityTypeRepositoryInterface $activityTypeRepository
    ) {}

    public function getActiveActivities()
    {
        return $this->activityTypeRepository->getAllActive();
    }

    public function getActivityDetails(int $activityId)
    {
        return $this->activityTypeRepository->findById($activityId);
    }
}
