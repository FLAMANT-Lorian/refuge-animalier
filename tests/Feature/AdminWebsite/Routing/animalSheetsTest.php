<?php

it('verifies if a you can access to the admin animal sheets index page', function () {
    $response = $this->get(route('admin.animal-sheets.index'));

    $response->assertStatus(200);
});
