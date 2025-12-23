<?php

use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        actingAs($this->user);
    });

    it('verifies if a you can access to the admin animals show page', function () {

        $animal = Animal::factory([
            'breed_id' => Breed::factory()->create([
                'species_id' => \App\Models\Species::factory()->create()
            ])
        ])->create();

        Livewire::test('pages::animals.show', ['animal' => $animal,])
            ->assertStatus(200);
    });

    it('verifies if you see the correct animal data in animal show page',
        function () {
            $animal = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => \App\Models\Species::factory()->create()
                    ]),
                    'name' => 'toto'
                ]);

            $user1 = User::factory()->create();
            $animal1 = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => \App\Models\Species::factory()->create()
                    ]),
                    'name' => 'titi'
                ]);

            Livewire::test('pages::animals.show', ['animal' => $animal])
                ->assertSee($animal->name)
                ->assertDontSee($animal1->name);
        }
    );
});
