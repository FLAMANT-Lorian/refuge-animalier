<?php

namespace Database\Factories;

use App\Enums\MessageStatus;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        $states = [MessageStatus::Read->value, MessageStatus::Unread->value];
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'submit_date' => Carbon::now(),
            'object' => $this->faker->words(4, true),
            'message' => $this->faker->text(),
            'status' => $this->faker->randomElement($states),
        ];
    }
}
