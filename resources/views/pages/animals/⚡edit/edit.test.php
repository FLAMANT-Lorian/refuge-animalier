<?php

use App\Enums\AnimalStatus;
use App\Enums\Sex;
use App\Enums\UserStatus;
use App\Models\Animal;
use App\Models\Breed;
use Livewire\Livewire;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;


describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()
            ->create([
                'role' => UserStatus::Volunteer->value
            ]);

        actingAs($this->user);
    });

    it('verifies if a you a volunteer can’t access to the admin animals edit page', function () {

        Livewire::test('pages::animals.edit')
            ->assertForbidden();
    });
});

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()
            ->create([
                'role' => UserStatus::Admin->value
            ]);

        actingAs($this->user);
    });

    it('verifies if it captures validation errors when submitting invalid values in the animals edit form', function () {
        $animal = Animal::factory()->create([
            'name' => 'toto',
            'breed_id' => Breed::factory()->create()
        ]);

        Livewire::test('pages::animals.edit',[$animal])
            ->set('form.name', 'titi')
            ->set('form.birth_date')
            ->set('form.sex', 'toto')
            ->set('form.breed', 'toto')
            ->set('form.coat')
            ->set('form.state', 'toto')
            ->set('form.character')
            ->call('save')
            ->assertHasErrors(
                [
                    'form.birth_date',
                    'form.sex',
                    'form.breed',
                    'form.coat',
                    'form.state',
                    'form.character'
                ]
            );

        // SI ERREUR, PAS DE MODIFICATION EN DB
        assertDatabaseHas('animals', ['name' => 'toto']);
    });

    it('verifies if you are redirected after successfully editing of an animal', function () {
        $animal = Animal::factory()->create([
            'name' => 'toto',
            'breed_id' => Breed::factory()->create()
        ]);

        Livewire::test('pages::animals.edit', [$animal])
            ->set('form.name', 'titi')
            ->set('form.birth_date', '1999-12-12')
            ->set('form.sex', Sex::Male->value)
            ->set('form.breed', Breed::first()->id)
            ->set('form.coat', 'red')
            ->set('form.state', AnimalStatus::Adopted->value)
            ->set('form.character', 'toto')
            ->call('save')
            ->assertHasNoErrors(
                [
                    'form.name',
                    'form.birth_date',
                    'form.sex',
                    'form.breed',
                    'form.coat',
                    'form.state',
                    'form.character'
                ])
            ->assertRedirect();

        // SI PAS D’ERREUR, MODIFICATION EN DB
        assertDatabaseHas('animals', ['name' => 'titi']);
    });
});
