<?php

namespace App\Livewire\Forms;

use App\Enums\AnimalStatus;
use App\Enums\Sex;
use App\Models\Animal;
use App\Models\Breed;
use App\Traits\AnimalsExtraValidationRules;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AnimalCreateForm extends Form
{
    use AnimalsExtraValidationRules;

    #[Validate('required')]
    public string $name;

    #[Validate('required|date_format:Y-m-d')]
    public string $birth_date;

    #[Validate('required')]
    public string $sex;

    #[Validate('required|exists:breeds,id')]
    public string $breed;

    #[Validate('required')]
    public string $coat;

    #[Validate('nullable')]
    public ?string $vaccines;

    #[Validate('required')]
    public string $state;

    #[Validate('required')]
    public string $character;

    public function setAnimal(): void
    {
        $this->breed = Breed::first()->id;
        $this->sex = Sex::Male->value;
        $this->state = AnimalStatus::AwaitingAdoption->value;
    }

    public function store(): Animal
    {
        return Animal::create([
            'name' => $this->name,
            'breed_id' => $this->breed,
            'birth_date' => $this->birth_date,
            'sex' => $this->sex,
            'coat' => $this->coat,
            'vaccines' => $this->vaccines ?? null,
            'state' => $this->state,
            'img_path' => 'public_2.webp',
            'character' => $this->character,
        ]);
    }
}
