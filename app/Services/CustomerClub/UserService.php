<?php

namespace App\Services\CustomerClub;

use App\Repositories\CustomerClub\UserRepositoryInterface;
use App\Repositories\CustomerClub\TierRepositoryInterface;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private TierRepositoryInterface $tierRepository
    ) {}

    public function getPaginatedUsers(int $perPage)
    {
        return $this->userRepository->paginateWithTierAndPoints($perPage);
    }

    public function getAllTiers()
    {
        return $this->tierRepository->all();
    }

    public function getUserWithDetails($userId)
    {
        return $this->userRepository->findWithDetails($userId);
    }
}
