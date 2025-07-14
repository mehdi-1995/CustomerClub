<?php

namespace App\Services\CustomerClub;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\CustomerClub\TierRepositoryInterface;
use App\Interfaces\CustomerClub\UserRepositoryInterface;

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

    public function getUserWithDetails()
    {
        $userId = Auth::id();
        return $this->userRepository->findWithDetails($userId);
    }

}
