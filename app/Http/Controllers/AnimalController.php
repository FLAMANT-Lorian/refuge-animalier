<?php

namespace App\Http\Controllers;

use App\Enums\AnimalStatus;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Builder;

class AnimalController extends Controller
{
    public function index()
    {

        $query = Animal::with('breed')->whereIn('state', [AnimalStatus::ProcessOfAdoption, AnimalStatus::AwaitingAdoption]);

        if (!empty($search = request()->input('search'))) {

            $query->where(function (Builder $q1) use ($search) {
                $q1->whereLike('name', '%' . $search . '%')
                    ->orWhereLike('coat', '%' . $search . '%')
                    ->orWhereLike('sex', '%' . $search . '%')
                    ->orWhereHas('breed', function ($q2) use ($search) {
                        $q2->whereLike('name', '%' . $search . '%');
                    });
            });

        }

        $animals = $query
            ->paginate(12);

        return view('public.animals.index', compact('animals', 'search'));
    }

    public
    function show($locale, Animal $animal)
    {
        if (!$animal->isVisible()) {
            abort(404);
        }

        return view('public.animals.show', compact('locale', 'animal'));
    }
}
