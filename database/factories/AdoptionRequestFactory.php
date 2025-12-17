<?php

namespace Database\Factories;

use App\Models\AdoptionRequest;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AdoptionRequestFactory extends Factory
{
    protected $model = AdoptionRequest::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->word(),
            'message' => $this->faker->word(),
            'rejection_message' => $this->faker->word(),
        ];
    }
}
