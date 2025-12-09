<?php

namespace App\Http\Controllers;

use App\Enums\AnimalStatus;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::whereIn('state', [AnimalStatus::ProcessOfAdoption, AnimalStatus::AwaitingAdoption])->paginate(12);

        return view('public.animals.index', compact('animals'));
    }

    public function show($locale, Animal $animal)
    {

        return view('public.animals.show', compact('locale', 'animal'));
    }
}
