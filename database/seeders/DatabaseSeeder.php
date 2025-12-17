<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\AnimalSheet;
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
            'status' => UserStatus::Admin->value
        ])->create();

        $user1 = User::factory()->create([
            'email' => 'lorian@volunteer.be',
            'status' => UserStatus::Volunteer->value
        ]);

        Animal::factory()
            ->has(AnimalNote::factory()->count(12))
            ->has(AnimalSheet::factory()->for($user))
            ->has(AnimalSheet::factory()->for($user1))
            ->has(AdoptionRequest::factory()->count(2))
            ->count(30)
            ->create();

        Message::factory()
            ->count(25)
            ->create();
    }
}
