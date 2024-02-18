<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'gender' => $this->faker->randomElement([null, 'f', 'm']),
            'description' => $this->faker->sentence(rand(4, 24)),
        ];
    }
}
