<?php

namespace App\Services\CustomerClub;

use App\Interfaces\CustomerClub\ActivityTypeRepositoryInterface;
use App\Models\ActivityType;

class ActivityTypeService
{
    public function __construct(
        private ActivityTypeRepositoryInterface $repository
    ) {}

    public function getActivityTypeByKey(string $key): ?ActivityType
    {
        return $this->repository->findByKey($key);
    }
}
