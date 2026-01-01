<?php

namespace App\Livewire\Forms;

use App\Models\Breed;
use App\Models\Species;
use Illuminate\Validation\Rule;
use Livewire\Form;

class BreedCreateForm extends Form
{
    public string $breed;

    public string $species;

    public function setSpecies(): void
    {
        $this->species = Species::first()->name;
        $this->breed = '';
    }

    public function store()
    {
        $species = Species::where('name', $this->species)->first();

        return $species->breeds()->create(['name' => $this->breed]);

    }

    public function rules(): array
    {
        $species_id = Species::where('name', $this->species)->first()->id;

        return [
            'breed' => [
                'required',
                Rule::unique('breeds', 'name')->where('species_id', $species_id)
            ],
            'species' => 'required|exists:species,name'
        ];
    }

    protected function messages(): array
    {
        return [
            'breed.unique' => __('validation.breed_already_exists'),
        ];
    }
}
