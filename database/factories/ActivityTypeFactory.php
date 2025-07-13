<?php

namespace Database\Factories;

use App\Models\ActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityType>
 */
class ActivityTypeFactory extends Factory
{
    protected $model = ActivityType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'key' => $this->faker->unique()->slug(1),
            'description' => $this->faker->sentence(),
            'points' => $this->faker->numberBetween(5, 100),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}
