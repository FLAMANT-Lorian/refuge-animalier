<?php

use App\Enums\UserStatus;
use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);
        actingAs($this->user);
    });

    it('verifies if a you can access to the admin animals show page', function () {

        $animal = Animal::factory([
            'breed_id' => Breed::factory()->create([
                'species_id' => Species::factory()->create()
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
                        'species_id' => Species::factory()->create()
                    ]),
                    'name' => 'toto'
                ]);

            $user1 = User::factory()->create();
            $animal1 = Animal::factory()
                ->create([
                    'breed_id' => Breed::factory()->create([
                        'species_id' => Species::factory()->create()
                    ]),
                    'name' => 'titi'
                ]);

            Livewire::test('pages::animals.show', ['animal' => $animal])
                ->assertSee($animal->name)
                ->assertDontSee($animal1->name);
        }
    );

    it('verifies if an admin or a volunteer can create a note', function () {
        $animal = Animal::factory()->create([
            'breed_id' => Breed::factory()->create([
                'species_id' => Species::factory()->create()
            ]),
        ]);

        Livewire::test('pages::animals.show', ['animal' => $animal])
            ->call('openModal', 'create-note')
            ->set('createNoteForm.full_name', 'toto')
            ->set('createNoteForm.email', 'toto@toto.be')
            ->set('createNoteForm.message', 'toto')
            ->set('createNoteForm.visit_date', '1999-12-12')
            ->call('createNote')
            ->assertHasNoErrors(['createNoteForm.full_name', 'createNoteForm.email', 'createNoteForm.message', 'createNoteForm.visit_date']);;

        assertDatabaseCount('animal_notes', 1);
    });

    it('verifies if you have errors message when you want to create a note with false value', function () {
        $animal = Animal::factory()
            ->has(AnimalNote::factory())
            ->create([
                'breed_id' => Breed::factory()->create([
                    'species_id' => Species::factory()->create()
                ]),
            ]);

        Livewire::test('pages::animals.show', ['animal' => $animal])
            ->call('openModal', 'edit-note', $animal->animalNotes()->first()->id)
            ->set('editNoteForm.full_name', '')
            ->set('editNoteForm.email', '')
            ->set('editNoteForm.message', '')
            ->set('editNoteForm.visit_date', '')
            ->call('editNote', $animal->animalNotes()->first()->id)
            ->assertHasErrors(['editNoteForm.full_name', 'editNoteForm.email', 'editNoteForm.message', 'editNoteForm.visit_date']);
    });

    it('verifies if a user can delete a note', function () {
        $animal = Animal::factory()
            ->has(AnimalNote::factory())
            ->create([
                'breed_id' => Breed::factory()->create([
                    'species_id' => Species::factory()->create()
                ]),
            ]);

        Livewire::test('pages::animals.show', ['animal' => $animal])
            ->call('openModal', 'delete-note', $animal->animalNotes()->first()->id)
            ->call('deleteNote', $animal->animalNotes()->first()->id);

        assertDatabaseCount('animal_notes', 0);
    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);

        actingAs($this->user);
    });

    it('verifies if a volunteer can create a sheet for an animal', function () {
        Livewire::test('pages::animals.index')
            ->call('openModal', 'ask-for-create')
            ->set('askToCreateAnimalForm.message', 'toto')
            ->call('askForCreation');

        assertDatabaseCount('animal_sheets', 1);
    });

    it('verifies if a volunteer can request a modification for an animal', function () {
        $animal = Animal::factory()
            ->create([
                'breed_id' => Breed::factory()->create([
                    'species_id' => Species::factory()->create()
                ]),
            ]);

        Livewire::test('pages::animals.index')
            ->call('openModal', 'ask-for-update', $animal->id)
            ->set('askToUpdateAnimalForm.message', 'toto')
            ->call('askForUpdate');

        assertDatabaseCount('animal_sheets', 1);
    });
});
