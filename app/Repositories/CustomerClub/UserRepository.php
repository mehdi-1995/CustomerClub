<?php

namespace App\Repositories\CustomerClub;

use App\Models\User;
use App\Interfaces\CustomerClub\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{

    public function paginateWithTierAndPoints(int $perPage): LengthAwarePaginator
    {
        return User::with(['tier', 'points'])
            ->orderByDesc('loyalty_points')
            ->paginate($perPage);
    }

    public function findWithDetails(int $userId): User
    {
        return User::with([
            'tier',
            'points.activityType',
            'tierHistories' => fn($q) => $q->orderByDesc('changed_at')
        ])->findOrFail($userId);
    }

    public function updateLoyaltyPoints(int $userId, int $points): bool
    {
        return User::where('id', $userId)->update([
            'loyalty_points' => $points
        ]);
    }

}
