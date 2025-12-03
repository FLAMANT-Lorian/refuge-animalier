<?php

it('verifies if a you can access to the admin volunteers create page', function () {
    Livewire::test('pages::volunteers.create')
        ->assertStatus(200);
});
