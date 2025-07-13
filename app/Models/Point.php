<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }

    protected static function booted()
    {
        static::created(function ($point) {
            $user = $point->user;
            $newTier = Tier::findForPoints($user->availablePoints());

            if ($newTier && $user->tier_id !== $newTier->id) {
                TierHistory::create([
                    'user_id' => $user->id,
                    'old_tier_id' => $user->tier_id,
                    'new_tier_id' => $newTier->id,
                    'reason' => 'امتیاز خودکار'
                ]);

                $user->update(['tier_id' => $newTier->id]);
            }
        });
    }
}
