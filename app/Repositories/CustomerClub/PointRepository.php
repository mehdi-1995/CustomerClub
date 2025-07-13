<?php

namespace App\Repositories\CustomerClub;

use App\Interfaces\CustomerClub\PointRepositoryInterface;
use App\Models\Point;
use Illuminate\Support\Collection; // این خط را اضافه کنید

class PointRepository implements PointRepositoryInterface
{
    public function create(array $data): Point
    {
        return Point::create($data);
    }

    public function getUserPoints(int $userId): Collection
    {
        return Point::where('user_id', $userId)
            ->with('activityType')
            ->orderByDesc('created_at')
            ->get();
    }

    public function getAvailablePointsSum(int $userId): int
    {
        return Point::where('user_id', $userId)
            ->where('is_used', false)
            ->where(function($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->sum('amount');
    }
}
