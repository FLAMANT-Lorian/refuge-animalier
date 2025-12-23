<?php

namespace Database\Factories;

use App\Enums\Sex;
use Carbon\Carbon;

use App\Enums\AnimalStatus;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {

        $animals_name = ['Pedro', 'Pascal', 'Capsule', 'Cléopatre', 'Harber'];

        $colors = ['Brun', 'Blanc', 'Noir'];

        $sex = [Sex::Male->value, Sex::Female->value];

        $vaccines = [null, 'Rage'];

        $states = [AnimalStatus::Adopted->value, AnimalStatus::InTreatment->value, AnimalStatus::ProcessOfAdoption->value, AnimalStatus::AwaitingAdoption->value];

        $adopted_at = [null, Carbon::now()];

        $file_name = uniqid() . '.png';

        Storage::disk('public')->putFileAs(
            'animals',
            UploadedFile::fake()->image($file_name),
            $file_name
        );

        return [
            'name' => $this->faker->randomElement($animals_name),
            'sex' => $this->faker->randomElement($sex),
            'coat' => $this->faker->randomElement($colors),
            'vaccines' => $this->faker->randomElement($vaccines),
            'character' => $this->faker->text(),
            'birth_date' => $this->faker->date(),
            'state' => $this->faker->randomElement($states),
            'pictures' => ["animals/" . $file_name],
            'adopted_at' => $this->faker->randomElement($adopted_at)
        ];
    }
}
