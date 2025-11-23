<?php

it('verifies if a you can access to the admin settings page', function () {
    $response = $this->get(route('admin.settings'));

    $response->assertStatus(200);
});
