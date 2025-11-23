<?php

use App\Enums\AnimalStatus;
use App\Models\Animal;

it('verifies if the animals that are displays in the animals index page are the animals with the correct status', function () {

    foreach (AnimalStatus::cases() as $status) {
        Animal::factory()->create(['state' => $status->value]);
    }

    $response = $this->get(route('public.animals.index'));

    $response->assertStatus(200);

    $response->assertSee(AnimalStatus::AwaitingAdoption->value);
    $response->assertSee(AnimalStatus::ProcessOfAdoption->value);

    $response->assertDontSee(AnimalStatus::Adopted->value);
    $response->assertDontSee(AnimalStatus::InTreatment->value);
});

it('verifies if a guest can access to a animal detail page and that the informations are correct', function () {

    $animal = Animal::factory()->create(
        ['state' => AnimalStatus::ProcessOfAdoption->value]
    )->toArray();

    $other_animal = Animal::factory()->create()->toArray();

    $response = $this->get(route('public.animals.show', $animal['id']));

    $response->assertStatus(200);

    $response->assertSee($animal['name']);
    $response->assertDontSee($other_animal['name']);
});
