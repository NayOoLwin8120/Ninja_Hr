<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->email,
            'email_verified_at' => now(),
            'password' => bcrypt('password123'), // password123
            'remember_token' => Str::random(10),
            'phone' => fake()->unique()->regexify('[0-9]{11}'),
            // 'nrc_number' => fake()->unique()->regexify('\d{2}\/[A-Z]{2}\/[A-Z]{2}\(\d\)\d{6}'),
            'role' => 'hr',

            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'employee_id' => fake()->unique()->regexify('[0-9]{11}'),
            'address' => fake()->address(),
            'is_present' => fake()->boolean(90),

            'profile' => fake()->text(),



        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
