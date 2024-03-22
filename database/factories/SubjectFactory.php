<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subject::class;
    public function definition(): array
    {
        $chaptersCount = Chapter::query()->count();
        return [
            'title' => ucfirst(fake()->words(fake()->numberBetween(1, 3), true)),
            'description' => fake()->sentence(fake()->numberBetween(3, 10)),
            'chapter_id' => fake()->numberBetween(1, $chaptersCount),
            'created_at' => now(),
        ];
    }
}
