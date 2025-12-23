<?php

use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        actingAs($this->user);
    });

    it('verifies if a you can access to the admin animals index page', function () {
        Livewire::test('pages::animals.index')
            ->assertStatus(200);
    });

    it('verifies if a user can see all animals on index page',
        function () {

            $animal = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => \App\Models\Species::factory()->create()
                    ]),
                    'name' => 'toto'
                ]);

            $other_animal = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => \App\Models\Species::factory()->create()
                    ]),
                    'name' => 'titi'
                ]);

            Livewire::test('pages::animals.index')
                ->assertSee($animal->name)
                ->assertSee($other_animal->name);
        }
    );
});
