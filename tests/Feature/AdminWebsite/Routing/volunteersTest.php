<?php

it('verifies if a you can access to the admin volunteers index page', function () {
    $response = $this->get(route('admin.volunteers.index'));

    $response->assertStatus(200);
});

it('verifies if a you can access to the admin volunteers create page', function () {
    $response = $this->get(route('admin.volunteers.create'));

    $response->assertStatus(200);
});

it('verifies if a you can access to the admin volunteers show page', function () {
    $response = $this->get(route('admin.volunteers.show'));

    $response->assertStatus(200);
});
