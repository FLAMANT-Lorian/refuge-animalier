<?php

namespace Database\Factories;

use App\Enums\Sex;
use App\Traits\HandleAnimalsImages;
use Carbon\Carbon;

use App\Enums\AnimalStatus;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class AnimalFactory extends Factory
{
    use HandleAnimalsImages;

    protected $model = Animal::class;

    public function definition(): array
    {
        $colors = ['Brun', 'Blanc', 'Noir'];

        $sex = [Sex::Male->value, Sex::Female->value];

        $vaccines = [null, 'Rage'];

        $states = [AnimalStatus::Adopted->value, AnimalStatus::InTreatment->value, AnimalStatus::ProcessOfAdoption->value, AnimalStatus::AwaitingAdoption->value];

        $adopted_at = [null, Carbon::now()->subDays(), Carbon::now()];

        return [
            'name' => $this->faker->name(),
            'sex' => $this->faker->randomElement($sex),
            'coat' => $this->faker->randomElement($colors),
            'vaccines' => $this->faker->randomElement($vaccines),
            'character' => $this->faker->text(),
            'birth_date' => $this->faker->date(),
            'state' => $this->faker->randomElement($states),
            'pictures' => null,
            'adopted_at' => $this->faker->randomElement($adopted_at)
        ];
    }
}
