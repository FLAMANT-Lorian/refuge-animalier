<?php

namespace Database\Factories;

use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = [UserStatus::Admin->value, UserStatus::Volunteer->value];
        $status = [VolunteerStatus::Parts->value, VolunteerStatus::Active->value, VolunteerStatus::InBreak->value];
        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->city(),
            'postal_code' => '4000',
            'role' => $this->faker->randomElement($roles),
            'status' => $this->faker->randomElement($status),
            'password' => Hash::make('1234567890'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
