<?php

it('verifies if a guest can access to the public website homePage', function (){
    $response = $this->get(route('public.homepage'));

    $response->assertStatus(200);
});
