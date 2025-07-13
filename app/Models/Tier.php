<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{

    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // پیدا کردن سطح مناسب بر اساس امتیاز
    public static function findForPoints($points)
    {
        return static::where('min_points', '<=', $points)
            ->where(function($query) use ($points) {
                $query->whereNull('max_points')
                      ->orWhere('max_points', '>=', $points);
            })
            ->orderByDesc('min_points')
            ->first();
    }
}
