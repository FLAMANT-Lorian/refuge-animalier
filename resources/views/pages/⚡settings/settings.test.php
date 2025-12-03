<?php

it('verifies if a you can access to the admin settings page', function () {
    Livewire::test('pages::settings')
        ->assertStatus(200);
});
