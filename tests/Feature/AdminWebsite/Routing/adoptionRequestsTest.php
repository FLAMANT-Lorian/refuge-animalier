<?php

it('verifies if a you can access to the admin adoption requests index page', function () {
    $response = $this->get(route('admin.adoption-requests.index'));

    $response->assertStatus(200);
});
