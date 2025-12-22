<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\AnimalSheet;
use App\Models\Breed;
use App\Models\Message;
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
            'email' => 'lorian@test.be',
            'role' => UserStatus::Admin->value
        ])->create();

        $user1 = User::factory()
            ->count(24)
            ->create([
                'role' => UserStatus::Volunteer->value
            ]);

        $breeds = Breed::factory()->count(50)->create();

        Animal::factory()
            ->has(AnimalNote::factory()->count(8))
            ->has(AnimalSheet::factory()->for($user))
            ->has(AdoptionRequest::factory()->count(2))
            ->count(30)
            ->afterMaking(function (Animal $animal) use ($breeds) {
                return $animal->breed_id = $breeds->random()->id;
            })
            ->create();

        Message::factory()
            ->count(25)
            ->create();
    }
}
