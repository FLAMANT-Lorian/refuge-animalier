<?php

namespace Database\Factories;

use Carbon\Carbon;

use App\Enums\AnimalStatus;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        $breed = ['Caniche', 'Berger Allemand', 'Dobermann'];

        $animals_name = ['Pedro', 'Pascal', 'Capsule', 'Cléopatre', 'Harber'];

        $colors = ['Brun', 'Blanc', 'Noir'];

        $sex = ['Mâle', 'Femelle'];

        $vaccines = [null, 'Rage'];

        $states = [AnimalStatus::Adopted->value, AnimalStatus::InTreatment->value, AnimalStatus::ProcessOfAdoption->value, AnimalStatus::AwaitingAdoption->value];

        $adopted_at = [null, Carbon::now()];


        return [
            'name' => $this->faker->randomElement($animals_name),
            'breed' => $this->faker->randomElement($breed),
            'sex' => $this->faker->randomElement($sex),
            'coat' => $this->faker->randomElement($colors),
            'vaccines' => $this->faker->randomElement($vaccines),
            'description' => $this->faker->text(),
            'birth_date' => $this->faker->date(),
            'state' => $this->faker->randomElement($states),
            'img_path' => 'public_2.webp',
            'adopted_at' => $this->faker->randomElement($adopted_at)
        ];
    }
}
