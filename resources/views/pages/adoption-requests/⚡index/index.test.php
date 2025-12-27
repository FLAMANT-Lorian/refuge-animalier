<?php

use App\Enums\UserStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);
        actingAs($this->user);
    });

    it('verifies if a you can access to the admin adoption requests index page',
        function () {

            Livewire::test('pages::adoption-requests.index')
                ->assertStatus(200);
        }
    );

    it('verifies if a user can see all adoption requests',
        function () {

            $animal1 = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => \App\Models\Species::factory()->create()
                    ]),
                ]);

            $animal2 = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => \App\Models\Species::factory()->create()
                    ]),
                ]);

            $adoptionsRequest1 = AdoptionRequest::factory()
                ->for($animal1)
                ->create();

            $adoptionsRequest2 = AdoptionRequest::factory()
                ->for($animal2)
                ->create();

            Livewire::test('pages::adoption-requests.index')
                ->assertSee($adoptionsRequest1->full_name, $adoptionsRequest2->full_name);
        }
    );
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);
        actingAs($this->user);
    });

    it('verifies if a volunteer can’t access to the admin adoption requests index page',
        function () {

            Livewire::test('pages::adoption-requests.index')
                ->assertForbidden();
        }
    );
});

