<?php

namespace Database\Seeders;

use App\Enums\SheetsStatus;
use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\AnimalSheet;
use App\Models\Breed;
use App\Models\Message;
use App\Models\Species;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Elise',
            'email' => 'elise@admin.be',
            'role' => UserStatus::Admin->value,
            'status' => VolunteerStatus::Active->value,
            'notifications' => [
                'adoption_requests' => true,
                'animal_sheets' => true,
                'messages' => true,
            ]
        ]);

        User::factory()
            ->create([
                'first_name' => 'Thomas',
                'email' => 'thomas@volunteer.be',
                'role' => UserStatus::Volunteer->value,
                'status' => VolunteerStatus::Active->value
            ]);

        $dogBreeds = [
            'Labrador',
            'Golden Retriever',
            'Bulldog',
            'Beagle',
            'Chihuahua',
        ];

        $catBreeds = [
            'Siamois',
            'Persan',
            'Maine Coon',
            'Bengal',
            'Sphynx',
        ];

        foreach (\App\Enums\Species::cases() as $type) {
            if ($type->value === \App\Enums\Species::DOG->value) {
                $dog_species = Species::factory()->create(['name' => $type->value]);

                foreach ($dogBreeds as $dogBreed) {
                    Breed::factory()->for($dog_species)->create(['name' => $dogBreed]);
                }
            } else if ($type->value === \App\Enums\Species::CAT->value) {
                $cat_species = Species::factory()->create(['name' => $type->value]);

                foreach ($catBreeds as $catBreed) {
                    Breed::factory()->for($cat_species)->create(['name' => $catBreed]);
                }
            } else {
                Species::factory()
                    ->create(['name' => $type->value]);
            }
        }

        $species = Species::all();

        $animal_sheet_creation = AnimalSheet::factory()->for($user)->count(10)->create(['status' => SheetsStatus::Creation->value]);

        Animal::factory()
            ->has(AnimalNote::factory()->count(4))
            ->has(AnimalSheet::factory()->for($user)->state(['status' => SheetsStatus::Modification->value]))
            ->has(AdoptionRequest::factory()->count(2))
            ->count(30)
            ->afterMaking(function (Animal $animal) use ($species) {
                return $animal->breed_id = $species->whereIn('name', [\App\Enums\Species::DOG->value, \App\Enums\Species::CAT->value])->random()->breeds->random()->id;
            })
            ->create();

        Message::factory()
            ->count(30)
            ->create();
    }
}
