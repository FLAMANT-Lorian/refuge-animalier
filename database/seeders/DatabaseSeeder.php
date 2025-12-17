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
            ->count(50)
            ->create();

        foreach ($animals as $animal) {
            AnimalNote::factory()
                ->for($animal)
                ->count(12)
                ->create();

            AnimalSheet::factory()
                ->for($animal)
                ->for($user)
                ->create();

            AdoptionRequest::factory()
                ->for($animal)
                ->count(3)
                ->create();
        }

        Message::factory()
            ->for($user)
            ->count(25)
            ->create();
    }
}
