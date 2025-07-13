<?php

namespace Database\Factories;

use App\Models\Tier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tier>
 */
class TierFactory extends Factory
{
    protected $model = Tier::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'color_code' => $this->faker->hexColor(),
            'min_points' => $this->faker->numberBetween(0, 10000),
            'max_points' => $this->faker->optional()->numberBetween(1000, 20000),
            'benefits' => $this->faker->sentence(6),
        ];
    }
}
