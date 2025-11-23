<?php

use App\Enums\AnimalStatus;
use App\Models\Animal;

it('verifies if a guest can access to the public website home page', function () {
    $response = $this->get(route('public.homepage'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website about page', function () {
    $response = $this->get(route('public.about'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website contact page', function () {
    $response = $this->get(route('public.contact'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website animals index page', function () {
    $response = $this->get(route('public.animals.index'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website animals show page', function () {
    $animal = Animal::factory()->create(
        ['state' => AnimalStatus::AwaitingAdoption->value]
    )->toArray();

    $response = $this->get(route('public.animals.show', $animal['id']));

    $response->assertStatus(200);
});
