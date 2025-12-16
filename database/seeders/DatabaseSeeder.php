<?php

namespace Database\Seeders;

use App\Models\Animal;
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

        Animal::factory()->count(50)->create();
    }
}
