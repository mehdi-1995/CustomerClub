<?php

namespace Database\Factories;

use App\Models\Tier;
use App\Models\TierHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TierHistory>
 */
class TierHistoryFactory extends Factory
{
    protected $model = TierHistory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'old_tier_id' => Tier::where('id', '!=', $user->tier_id)->inRandomOrder()->first()->id,
            'new_tier_id' => $user->tier_id,
            'reason' => $this->faker->randomElement([
                'ارتقاء خودکار',
                'ارتقاء دستی',
                'تغییر سیاست‌ها',
                'پاداش ویژه'
            ]),
        ];
    }
}
