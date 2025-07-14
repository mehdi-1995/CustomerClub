<?php

namespace App\Interfaces\CustomerClub;

interface ActivityServiceInterface
{
    public function getActiveActivities();
    public function getActivityDetails(int $activityId);
}
