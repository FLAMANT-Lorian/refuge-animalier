<?php

namespace Database\Factories;

use App\Enums\SheetsStatus;
use App\Models\Animal;
use App\Models\AnimalSheet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AnimalSheetFactory extends Factory
{
    protected $model = AnimalSheet::class;

    public function definition(): array
    {
        $states = [SheetsStatus::Creation->value, SheetsStatus::InOrder->value, SheetsStatus::Modification->value];

        return [
            'date' => Carbon::now(),
            'status' => $this->faker->randomElement($states),
            'message' => $this->faker->word(),
        ];
    }
}
