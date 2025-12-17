<?php

use App\Models\Animal;
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

    it('verifies if a user can get only his animals on index page',
        function () {
            $other_user = User::factory()->create();

            $animal = Animal::factory()
                ->for($this->user)
                ->create([
                    'name' => 'toto'
                ]);

            $other_animal = Animal::factory()
                ->for($other_user)
                ->create([
                    'name' => 'titi'
                ]);

            Livewire::test('pages::animals.index')
                ->assertSee($animal->name)
                ->assertDontSee($other_animal->name);
        }
    );
});
