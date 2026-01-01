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
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->city(),
            'postal_code' => '4000',
            'role' => $this->faker->randomElement($roles),
            'status' => $this->faker->randomElement($status),
            'password' => Hash::make('1234567890'),
            'email_verified_at' => now(),
            'notifications' => [
                'adoption_requests' => false,
                'animal_sheets' => false,
                'messages' => false,
            ],
            'availability' => [
                'monday' => '',
                'tuesday' => '',
                'wednesday' => '',
                'thursday' => '',
                'friday' => '',
                'saturday' => '',
                'sunday' => '',
            ],
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
