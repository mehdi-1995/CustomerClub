<?php

namespace Database\Factories;

use App\Models\ActivityType;
use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    protected $model = Point::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'activity_type_id' => ActivityType::inRandomOrder()->first()->id,
            'amount' => $this->faker->numberBetween(5, 100),
            'source' => $this->faker->optional()->word(),
            'expires_at' => $this->faker->optional(0.3)->dateTimeBetween('+1 month', '+1 year'),
            'is_used' => $this->faker->boolean(20),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
