<?php

namespace Database\Factories;

use App\Models\{ User, Client };
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'client_id' => Client::all()->random()->id,
            'title' => $this->faker->catchPhrase(),
            'description' => $this->faker->sentence(rand(6, 36)),
            'deadline' => now()->addWeek(),
        ];
    }
}
