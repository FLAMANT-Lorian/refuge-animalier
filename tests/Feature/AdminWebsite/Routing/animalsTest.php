<?php

use App\Models\Animal;

it('verifies if a you can access to the admin animals index page', function () {
    $response = $this->get(route('admin.animals.index'));

    $response->assertStatus(200);
});

it('verifies if a you can access to the admin animals create page', function () {
    $response = $this->get(route('admin.animals.create'));

    $response->assertStatus(200);
});

it('verifies if a you can access to the admin animals show page', function () {
    $animal = Animal::factory()->create()->toArray();
    $response = $this->get(route('admin.animals.create', $animal['id']));

    $response->assertStatus(200);
});

it('verifies if a you can access to the admin animals edit page', function () {
    $animal = Animal::factory()->create()->toArray();
    $response = $this->get(route('admin.animals.create', $animal['id']));

    $response->assertStatus(200);
});
