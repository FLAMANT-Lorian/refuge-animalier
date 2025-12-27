<?php

namespace App\Http\Controllers;

use App\Enums\AdoptionRequestsStatus;
use App\Http\Requests\StoreAdoptionRequest;
use App\Models\Animal;

class AdoptionRequestController extends Controller
{
    public function store(StoreAdoptionRequest $request)
    {
        $adoptionRequest = $request->validated();

        $animal = Animal::findOrFail($adoptionRequest['animal_id']);

        $animal->adoptionRequests()->create([
            'full_name' => $adoptionRequest['full_name'],
            'email' => $adoptionRequest['email'],
            'message' => $adoptionRequest['message'],
            'status' => AdoptionRequestsStatus::Awaiting->value
        ]);

        session()->flash('status', 'Demande envoyée avec succès !');

        return redirect()->back();
    }
}
