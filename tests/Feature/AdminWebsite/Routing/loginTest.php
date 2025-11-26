<?php


it('verifies if a you can access to the admin login page', function () {
    $response = $this->get(route('admin.login'));

    $response->assertStatus(200);
});
