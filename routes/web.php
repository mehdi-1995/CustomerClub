<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\CustomerClub\ActivityTypeService;
use App\Http\Controllers\CustomerClub\{
    UserController,
    PointController,
    CustomerClubController
};
use App\Models\User;

Route::prefix('customer-club')->group(function() {
    Route::get('/users', [UserController::class, 'index'])->name('customer-club.users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('customer-club.users.show');

    Route::post('/points', [PointController::class, 'store'])->name('customer-club.points.store');
});

Route::middleware(['auth'])->prefix('customer-club')->name('customer-club.')->group(function () {
    // Dashboard

    // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard', [CustomerClubController::class, 'dashboard'])->name('dashboard');

    // Points
    Route::post('/points', [PointController::class, 'store'])->name('points.store');
});


// Route::get('/test-activity', function(ActivityTypeService $service) {
//     $activity = $service->getActivityTypeByKey('purchase');
//     dd($activity);
// });

// در routes/web.php
Route::get('/test-user', function() {
    $userService = app(\App\Services\CustomerClub\UserService::class);
    $user = $userService->getUserWithDetails(1);
    dd($user);
});

Route::get('/', function () {
    $user = User::find(1);
    Auth::login($user);
    return view('welcome');
});
