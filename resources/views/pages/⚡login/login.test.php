<?php


it('verifies if a you can access to the admin login page', function () {
    Livewire::test('pages::login')
        ->assertStatus(200);
});
