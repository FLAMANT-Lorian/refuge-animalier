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
        User::factory([
            'name' => 'Flamant Lorian',
            'email' => 'lorian@test.be',
            'password' => '1234567890'
        ])->create();

        Animal::factory()->count(50)->create();
    }
}
