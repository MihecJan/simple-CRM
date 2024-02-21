<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::all()->random()->id,
            'task' => $this->faker->catchPhrase(),
            'description' => $this->faker->sentence(rand(6, 36)),
            'deadline' => now()->addDays($this->faker->numberBetween(1, 7)),
        ];
    }
}
