<?php

use App\Enums\UserStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);

        actingAs($this->user);
    });

    it('verifies if an admin can access to create adoption request view', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        Animal::factory()->for($breed)->create();

        Livewire::test('pages::adoption-requests.create')
            ->assertOk();
    });

    it('verifies if an admin can create an adoption request with the minimum requirement', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        Animal::factory()->for($breed)->create();

        Livewire::test('pages::adoption-requests.create')
            ->set('form.full_name', 'toto')
            ->set('form.email', 'toto@toto.be')
            ->set('form.message', 'toto')
            ->call('save');

        $adoption_request = AdoptionRequest::first();

        expect($adoption_request->full_name)->toBe('toto');
        assertDatabaseCount('adoption_requests', 1);
    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);

        actingAs($this->user);
    });

    it('verifies if an volunteer can\'t access to adoption request create page', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
       Animal::factory()->for($breed)->create();

        Livewire::test('pages::adoption-requests.create')
            ->assertOK();
    });
});
