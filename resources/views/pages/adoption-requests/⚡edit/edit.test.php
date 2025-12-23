<?php

use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\Breed;
use Livewire\Livewire;

it('renders successfully', function () {
    $animal = Animal::factory()->create([
        'breed_id' => Breed::factory()->create([
            'species_id' => \App\Models\Species::factory()->create()
        ]),
    ]);

    $adoption_request = AdoptionRequest::factory()->for($animal)->create();

    Livewire::test('pages::adoption-requests.edit', [
            'adoption_request' => $adoption_request,
        ]
    )->assertStatus(200);
});
