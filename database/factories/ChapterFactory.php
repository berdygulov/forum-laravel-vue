<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Chapter::class;
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->words(fake()->numberBetween(1, 5), true)),
            'description' => fake()->sentence(fake()->numberBetween(3, 15)),
            'created_at' => now(),
        ];
    }
}
