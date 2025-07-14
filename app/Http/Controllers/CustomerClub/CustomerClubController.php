<?php

namespace App\Http\Controllers\CustomerClub;

use App\Http\Controllers\Controller;
use App\Services\CustomerClub\{
    UserService,
    PointService,
    TierService,
    ActivityService
};

class CustomerClubController extends Controller
{
    public function __construct(
        private UserService $userService,
        private PointService $pointService,
        private TierService $tierService,
        private ActivityService $activityService
    ) {}

    public function dashboard()
    {
        $user = $this->userService->getUserWithDetails();
        $tier = $this->tierService->getUserTierWithProgress($user->id);
        $activities = $this->activityService->getActiveActivities();
        $pointsHistory = $this->pointService->getUserPointsHistory($user->id);

        return view('customer-club.dashboard', compact(
            'user',
            'tier',
            'activities',
            'pointsHistory'
        ));
    }
}
