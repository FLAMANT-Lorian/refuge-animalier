<?php

use App\Enums\AnimalStatus;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;

it('verifies if a guest can access to the public website home page', function () {
    $response = $this->get(route('public.homepage', config('app.locale')));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website about page', function () {
    $response = $this->get(route('public.about', config('app.locale')));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website contact page', function () {
    $response = $this->get(route('public.contact', config('app.locale')));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website animals index page', function () {
    $response = $this->get(route('public.animals.index', config('app.locale')));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website animals show page', function () {
    $user = User::factory()->create();

    $animal = Animal::factory([
        'breed_id' => Breed::factory()->create(),
    ])->create(
        ['state' => AnimalStatus::AwaitingAdoption->value]
    )->toArray();

    $response = $this->get(route('public.animals.show',
        [
            'locale' => config('app.locale'),
            'animal' => $animal['id']
        ]
    ));

    $response->assertStatus(200);
});
