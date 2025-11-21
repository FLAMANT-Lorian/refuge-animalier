<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::whereIn('state',  ['En cours d’adoptions', 'En attente d’adoption'])->paginate(8);

        return view('public.animals.index', compact('animals'));
    }
}
