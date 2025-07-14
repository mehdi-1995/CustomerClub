<?php

namespace App\Http\Controllers\CustomerClub;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerClub\ActivityTypeRepositoryInterface;

class ActivityTypeController extends Controller
{
    public function __construct(
        private ActivityTypeRepositoryInterface $repository
    ) {}
}
