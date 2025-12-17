<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'submit_date' => Carbon::now(),
            'message' => $this->faker->word(),
        ];
    }
}
