<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\AnimalNote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AnimalNoteFactory extends Factory
{
    protected $model = AnimalNote::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'visit_date' => Carbon::now(),
            'note' => $this->faker->word(),

            'animal_id' => Animal::factory(),
        ];
    }
}
