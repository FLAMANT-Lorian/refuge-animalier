<?php

use App\Enums\UserStatus;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;
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
            $species = Species::factory()->create();
            $breed = Breed::factory()->for($species)->create();
            $animal = Animal::factory()->for($breed)->create();

            Livewire::test('pages::animals.index')
                ->assertSee($animal->breed->name, false)
                ->assertSee($animal->name, false);
        }
    );
});

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);
        actingAs($this->user);
    });

    it('verifies if an admin can delete an animal', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        Livewire::test('pages::animals.index')
            ->call('delete', $animal->id)
            ->assertOk();
    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);
        actingAs($this->user);
    });

    it('verifies if an volunteer can’t delete an animal', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        Livewire::test('pages::animals.index')
            ->call('delete', $animal->id)
            ->assertForbidden();
    });
});
