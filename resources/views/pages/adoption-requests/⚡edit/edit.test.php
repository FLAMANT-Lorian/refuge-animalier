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

    it('verifies if an admin can view an adoption request for an animal an edit it', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        $adoption_request = AdoptionRequest::factory()
            ->for($animal)
            ->create([
                'full_name' => 'titi'
            ]);

        Livewire::test('pages::adoption-requests.edit', [
            'adoption_request' => $adoption_request,
        ])->set('form.full_name', 'toto')
            ->call('save');

        $new_data = AdoptionRequest::first();

        expect($new_data->full_name)->toBe('toto');
    });

    it('verifies if an admin can delete an adoption request', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        $adoption_request = AdoptionRequest::factory()
            ->for($animal)
            ->create();

        assertDatabaseCount('adoption_requests', 1);

        Livewire::test('pages::adoption-requests.edit', [
            'adoption_request' => $adoption_request
        ])->call('openModal', 'delete-adoption-request', $adoption_request->id)
            ->call('delete', $adoption_request->id);

        assertDatabaseCount('adoption_requests', 0);

    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);

        actingAs($this->user);
    });

    it('verifies if an volunteer can access to adoption requests page', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        $adoption_request = AdoptionRequest::factory()
            ->for($animal)
            ->create([
                'full_name' => 'titi'
            ]);

        Livewire::test('pages::adoption-requests.edit', [
            'adoption_request' => $adoption_request,
        ])->assertOK();
    });
});
