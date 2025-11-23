<?php

it('verifies if a you can access to the admin dashboard page', function () {
    $response = $this->get(route('admin.dashboard'));

    $response->assertStatus(200);
});
