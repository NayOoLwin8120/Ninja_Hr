<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->Str::random(4),
            'email_verified_at' => now(),
            'password' => bcrypt('password123'), // password123
            'remember_token' => Str::random(10),
            'phone' => fake()->unique()->regexify('[0-9]{11}'),
            // 'nrc_number' => fake()->unique()->regexify('\d{2}\/[A-Z]{2}\/[A-Z]{2}\(\d\)\d{6}'),
            'role' => 'employee',

            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'employee_id' => fake()->unique()->regexify('[0-9]{11}'),
            'address' => fake()->address(),
            'is_present' => fake()->boolean(90),

            'profile' => fake()->text(),

        ];
    }
}
