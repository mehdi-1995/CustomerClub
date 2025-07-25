<?php

namespace App\Http\Controllers\CustomerClub;

use App\Http\Controllers\Controller;
use App\Services\CustomerClub\{
    UserService,
    PointService,
    TierService,
    ActivityService
};
class UserController extends Controller
{
    public function __construct(
        private UserService $userService,
        private PointService $pointService,
        private TierService $tierService,
        private ActivityService $activityService
    ) {}

    public function index()
    {
        $users = $this->userService->getPaginatedUsers(10);
        $tiers = $this->userService->getAllTiers();

        return view('customer-club.users.index', compact('users', 'tiers'));
    }

    public function show($userId)
    {
        $user = $this->userService->getUserWithDetails($userId);
        return view('customer-club.users.show', compact('user'));
    }

    public function dashboard()
    {
        $user = $this->userService->getUserWithDetails();
        $tier = $this->tierService->getUserTierWithProgress($user->id);
        $activities = $this->activityService->getActiveActivities();
        $pointsHistory = $this->pointService->getUserPointsHistory($user->id);

        dd($tier);

        return view('customer-club.dashboard', compact(
            'user',
            'tier',
            'activities',
            'pointsHistory'
        ));
    }


}
