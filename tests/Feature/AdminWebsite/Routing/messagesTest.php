<?php

it('verifies if a you can access to the admin messages index page', function () {
    $response = $this->get(route('admin.messages.index'));

    $response->assertStatus(200);
});
