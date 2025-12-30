<?php

use App\Enums\AnimalStatus;
use App\Enums\Sex;
use App\Enums\UserStatus;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);
        actingAs($this->user);

        Breed::factory()->count(50)->create([
            'species_id' => Species::factory()->create()
        ]);
    });

    it('verifies if a you a volunteer can’t access to the admin animals create page', function () {

        Livewire::test('pages::animals.create')
            ->assertForbidden();
    });
});

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);
        actingAs($this->user);

        Breed::factory()->count(50)->create([
            'species_id' => Species::factory()->create()
        ]);
    });

    it('verifies if a you an admin can access to the admin animals create page', function () {

        Livewire::test('pages::animals.create')
            ->assertOk();
    });

    it('verifies if it captures validation errors when submitting invalid values in the animals create form', function () {
        Livewire::test('pages::animals.create')
            ->set('form.name')
            ->set('form.birth_date')
            ->set('form.sex', 'toto')
            ->set('form.breed', 'toto')
            ->set('form.coat')
            ->set('form.state', 'toto')
            ->set('form.character')
            ->call('save')
            ->assertHasErrors(
                [
                    'form.name',
                    'form.birth_date',
                    'form.sex',
                    'form.breed',
                    'form.coat',
                    'form.state',
                    'form.character'
                ]
            );

        expect(Animal::count())->toBe(0);
    });

    it('verifies if you are redirected after successfully creating of an animal', function () {
        Storage::fake();

        $file = UploadedFile::fake()->image('test.png');

        Livewire::test('pages::animals.create')
            ->set('form.name', 'toto')
            ->set('form.birth_date', '1999-12-12')
            ->set('form.sex', Sex::Male->value)
            ->set('form.breed', Breed::first()->id)
            ->set('form.coat', 'red')
            ->set('form.state', AnimalStatus::Adopted->value)
            ->set('form.character', 'toto')
            ->set('form.pictures', $file)
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

        expect(Animal::count())->toBe(1);

        $animal = Animal::first();

        $file_name = $animal->pictures[0];

        Storage::assertExists('animals/original/' . $file_name);
    });

    it('verifies if an admin can add a breed', function () {
        $species = Species::factory()->create();

        Livewire::test('pages::animals.create')
            ->call('openModal', 'add-breed')
            ->set('breedForm.species', $species->name)
            ->set('breedForm.breed', 'toto')
            ->call('addBreed');

        assertDatabaseHas('breeds', ['name' => 'toto']);
    });

    it('verifies if an admin can\'t add a breed that already exists', function () {
        $species = Species::factory()->create();
        Breed::factory()->for($species)->create(['name' => 'toto']);

        Livewire::test('pages::animals.create')
            ->call('openModal', 'add-breed')
            ->set('breedForm.species', $species->name)
            ->set('breedForm.breed', 'toto')
            ->call('addBreed')
            ->assertHasErrors(['breedForm.breed']);
    });
});
