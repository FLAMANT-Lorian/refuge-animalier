<?php

use App\Enums\UserStatus;
use App\Models\Animal;
use App\Models\AnimalSheet;
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

    it('verifies if an admin can access to the admin animal sheets index page', function () {
        Livewire::test('pages::animal-sheets.index')
            ->assertStatus(200);
    });

    it('verifies if a user can see all animals-sheets',
        function () {
            $species = Species::factory()->create();
            $breed = Breed::factory()->for($species)->create();
            $animal = Animal::factory()->for($breed)->create();

            $sheet = AnimalSheet::factory()
                ->for($this->user)
                ->for($animal)
                ->create();


            Livewire::test('pages::animal-sheets.index')
                ->assertSee(__('enum.' . $sheet->status));
        }
    );

    it('verifies if an admin can delete a sheet', function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        $sheet = AnimalSheet::factory()
            ->for($this->user)
            ->for($animal)
            ->create();

        Livewire::test('pages::animal-sheets.index')
            ->call('openModal', 'delete-sheet', $sheet->id)
        ->call('deleteSheet', $sheet->id);

        assertDatabaseCount('animal_sheets', 0);
    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);

        actingAs($this->user);
    });

    it('verifies if a volunteer can’t access to animal sheets index page', function () {
        Livewire::test('pages::animal-sheets.index')
            ->assertForbidden();
    });
});
