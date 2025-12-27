<?php

namespace Database\Seeders;

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
        $user = User::factory([
            'first_name' => 'Lorian',
            'last_name' => 'Flamant',
            'email' => 'lorian@admin.be',
            'role' => UserStatus::Admin->value,
            'status' => VolunteerStatus::Active->value
        ])->create();

        $user1 = User::factory()
            ->create([
                'email' => 'lorian@volunteer.be',
                'role' => UserStatus::Volunteer->value,
                'status' => VolunteerStatus::Active->value
            ]);

        foreach (\App\Enums\Species::cases() as $type) {
            Species::factory()
                ->has(Breed::factory()->count(2))
                ->create(['name' => $type->value]);
        }

        $species = Species::all();

        Animal::factory()
            ->has(AnimalNote::factory()->count(8))
            ->has(AnimalSheet::factory()->for($user))
            ->has(AdoptionRequest::factory()->count(2))
            ->count(30)
            ->afterMaking(function (Animal $animal) use ($species) {
                return $animal->breed_id = $species->random()->breeds->random()->id;
            })
            ->create();

        Message::factory()
            ->count(25)
            ->create();
    }
}
