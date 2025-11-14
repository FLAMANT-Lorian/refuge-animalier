<?php

it('verifies if a guest can access to the public website home page', function (){
    $response = $this->get(route('public.homepage'));

    $response->assertStatus(200);
});

it('verifies if a guest can access to the public website about page', function (){
    $response = $this->get(route('public.about'));

    $response->assertStatus(200);
});
