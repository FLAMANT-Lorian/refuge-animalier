<?php

namespace Database\Factories;

use App\Enums\Sex;
use App\Traits\HandleImages;
use Carbon\Carbon;

use App\Enums\AnimalStatus;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class AnimalFactory extends Factory
{
    use HandleImages;

    protected $model = Animal::class;

    public function definition(): array
    {

        $animals_name = ['Pedro', 'Pascal', 'Capsule', 'Cléopatre', 'Harber'];

        $colors = ['Brun', 'Blanc', 'Noir'];

        $sex = [Sex::Male->value, Sex::Female->value];

        $vaccines = [null, 'Rage'];

        $states = [AnimalStatus::Adopted->value, AnimalStatus::InTreatment->value, AnimalStatus::ProcessOfAdoption->value, AnimalStatus::AwaitingAdoption->value];

        $adopted_at = [null, Carbon::now()];

        return [
            'name' => $this->faker->randomElement($animals_name),
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
