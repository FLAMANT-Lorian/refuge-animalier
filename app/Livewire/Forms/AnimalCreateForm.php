<?php

namespace App\Livewire\Forms;

use App\Enums\AnimalStatus;
use App\Enums\Sex;
use App\Models\Animal;
use App\Models\Breed;
use App\Traits\AnimalsRules;
use App\Traits\HandleImages;
use Livewire\Form;

class AnimalCreateForm extends Form
{
    use AnimalsRules;
    use HandleImages;

    public string $name;
    public string $birth_date;
    public string $sex;
    public string $breed;
    public string $coat;
    public ?string $vaccines;
    public string $state;
    public string $character;
    public ?array $pictures = [];

    public function setAnimal(): void
    {
        $this->breed = Breed::orderBy('name')->first()->id;
        $this->sex = Sex::Male->value;
        $this->state = AnimalStatus::AwaitingAdoption->value;
    }

    public function store(): Animal
    {
        $picturesDB = [];

        if (!empty($this->pictures)) {
            foreach ($this->pictures as $picture) {
                $picturesDB[] = $this->generateSizedImages($picture);
            }
        }

        return Animal::create([
            'name' => $this->name,
            'breed_id' => $this->breed,
            'birth_date' => $this->birth_date,
            'sex' => $this->sex,
            'coat' => $this->coat,
            'vaccines' => $this->vaccines ?? null,
            'state' => $this->state,
            'pictures' => $picturesDB,
            'character' => $this->character,
        ]);
    }
}
