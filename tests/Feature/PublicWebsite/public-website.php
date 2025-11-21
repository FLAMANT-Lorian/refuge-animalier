<?php

use App\Models\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;

it('verifies if a guest can access to the public website home page', function (){
    $response = $this->get(route('public.homepage'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website about page', function (){
    $response = $this->get(route('public.about'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website contact page', function (){
    $response = $this->get(route('public.contact'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website animals index page', function (){
    uses(RefreshDatabase::class);

    $animals = Animal::factory()->count(50)->create();

    $response = $this->get(route('public.animals.index'));

    $response->assertStatus(200);
});
