<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
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
    public function definition()
    {
        return [
            'full_name' => fake('ar_SA')->name(),
            'phone' => fake('ar_SA')->phoneNumber(),
            'national_id' => rand(530976, 999999),
            'email' => fake()->unique()->safeEmail(),
            'birth_date' => fake()->date('Y-m-d'),
            'age' => rand(10, 35),
            'role_id' => RoleEnum::STUDENT->value,
            'email_verified_at' => now(),
            'password' => bcrypt('student'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
