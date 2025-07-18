<?php

namespace App\Http\Controllers\CustomerClub;

use App\Http\Requests\CustomerClub\StorePointRequest;
use App\Services\CustomerClub\PointService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function __construct(
        private PointService $pointService
    ) {}

    public function store(StorePointRequest $request)
    {
        $this->pointService->addPointsToUser(
            Auth::id(),
            $request->validated()
        );

        return redirect()->back()
            ->with('success', 'امتیاز با موفقیت ثبت شد!');
    }
}
