<?php

use App\Models\Animal;
use App\Models\AnimalSheet;
use App\Models\Breed;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {

    beforeEach(function () {
        $this->user = User::factory()->create();
        actingAs($this->user);
    });

    it('verifies if a you can access to the admin animal sheets index page', function () {
        Livewire::test('pages::animal-sheets.index')
            ->assertStatus(200);
    });

    it('verifies if a user can see all animals-sheets',
        function () {
            $animal = Animal::factory()->create([
                'breed_id' => Breed::factory()->create(),
            ]);

            $sheet = AnimalSheet::factory()
                ->for($this->user)
                ->for($animal)
                ->create();


            Livewire::test('pages::animal-sheets.index')
                ->assertSee($sheet->status);
        }
    );
});
