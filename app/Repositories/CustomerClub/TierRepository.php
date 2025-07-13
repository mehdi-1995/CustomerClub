<?php

namespace App\Repositories\CustomerClub;

use App\Interfaces\CustomerClub\TierRepositoryInterface;
use App\Models\Tier;
use Illuminate\Support\Collection; // این خط را اضافه کنید

class TierRepository implements TierRepositoryInterface
{
    public function all(): Collection
    {
        return Tier::orderBy('min_points')->get();
    }

    public function findTierForPoints(int $points): ?Tier
    {
        return Tier::where('min_points', '<=', $points)
            ->where(function($query) use ($points) {
                $query->whereNull('max_points')
                      ->orWhere('max_points', '>=', $points);
            })
            ->orderByDesc('min_points')
            ->first();
    }

    public function getDefaultTier(): Tier
    {
        return Tier::orderBy('min_points')->first();
    }
}
