<?php

namespace Database\Seeders;

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
        ])->create();

        $animals = Animal::factory()
            ->for($user)
            ->has(AnimalNote::factory()->count(12))
            ->has(AnimalSheet::factory()->for($user))
            ->has(AdoptionRequest::factory()->count(2)->for($user))
            ->count(30)
            ->create();

        Message::factory()
            ->for($user)
            ->count(25)
            ->create();
    }
}
