<?php

namespace Database\Factories;

use App\Enums\AdoptionRequestsStatus;
use App\Models\AdoptionRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdoptionRequestFactory extends Factory
{
    protected $model = AdoptionRequest::class;

    public function definition(): array
    {
        $states = [AdoptionRequestsStatus::InWay->value, AdoptionRequestsStatus::Awaiting->value, AdoptionRequestsStatus::Closed->value, AdoptionRequestsStatus::Refused->value];

        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement($states),
            'message' => $this->faker->word(),
            'rejection_message' => $this->faker->word(),
        ];
    }
}
