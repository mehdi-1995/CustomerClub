<?php

namespace App\Http\Controllers\CustomerClub;

use App\Services\CustomerClub\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
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
}
