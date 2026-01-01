<?php

use App\Mail\AdoptionRequestCreatedMail;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;
use function Pest\Laravel\assertDatabaseCount;

it('verifies if a user can create an adoption request with th form in public website', function () {
    $species = Species::factory()->create();
    $breed = Breed::factory()->for($species)->create();
    $animal = Animal::factory()->for($breed)->create();

    $adoption_request = AdoptionRequest::factory()->for($animal)->raw();

    $response = $this->from(route('public.animals.show', ['locale' => app()->getLocale(), 'animal' => $animal]))
        ->post(route('public.adoption-request.store',
            [
                'locale' => app()->getLocale()
            ]
        ), $adoption_request)
        ->assertRedirectBack();

    assertDatabaseCount('adoption_requests', 1);
});

it('verifies if the validation work correctly in public website', function () {
    $species = Species::factory()->create();
    $breed = Breed::factory()->for($species)->create();
    $animal = Animal::factory()->for($breed)->create();

    $adoption_request = AdoptionRequest::factory()->for($animal)->raw([
        'full_name' => '',
        'email' => '',
        'message' => ''
    ]);

    $response = $this->from(route('public.animals.show', ['locale' => app()->getLocale(), 'animal' => $animal]))
        ->post(route('public.adoption-request.store',
            [
                'locale' => app()->getLocale()
            ]
        ), $adoption_request)
        ->assertInvalid(['full_name', 'email', 'message']);

    assertDatabaseCount('adoption_requests', 0);
});

it('verifies if the content in the mail is correct ', function () {
    $species = Species::factory()->create();
    $breed = Breed::factory()->for($species)->create();
    $animal = Animal::factory()->for($breed)->create();
    $adoptionRequest = AdoptionRequest::factory()->for($animal)->create();

    $mail = new AdoptionRequestCreatedMail($adoptionRequest);

    $mail->assertSeeInHtml('Nouvelle demande d’adoption');
    $mail->assertSeeInHtml($adoptionRequest->animal->name);
    $mail->assertHasSubject('Nouvelle demande d’adoption');
});
