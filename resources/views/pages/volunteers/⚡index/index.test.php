<?php

it('verifies if a you can access to the admin volunteers index page', function () {
    Livewire::test('pages::volunteers.index')
        ->assertStatus(200);
});
