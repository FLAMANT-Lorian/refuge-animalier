<?php

namespace App\Livewire\Forms;

use App\Models\Animal;
use App\Traits\AnimalsRules;
use Livewire\Form;

class AnimalEditForm extends Form
{
    use AnimalsRules;

    public Animal $animal;

    public string $name;
    public string $birth_date;
    public string $sex;
    public string $breed;
    public string $coat;
    public ?string $vaccines;
    public string $state;
    public string $character;

    public function setAnimal(Animal $animal): void
    {
        $this->animal = $animal;
        $this->name = $animal->name;
        $this->birth_date = $animal->birth_date->format('Y-m-d');
        $this->sex = $animal->sex;
        $this->breed = $animal->breed->id;
        $this->coat = $animal->coat;
        $this->vaccines = $animal->vaccines;
        $this->state = $animal->state;
        $this->character = $animal->character;
    }

    public function update(): Animal
    {
        $this->animal->update([
                'name' => $this->name,
                'breed_id' => $this->breed,
                'birth_date' => $this->birth_date,
                'sex' => $this->sex,
                'coat' => $this->coat,
                'vaccines' => $this->vaccines ?? null,
                'state' => $this->state,
                'img_path' => 'public_2.webp',
                'character' => $this->character,
            ]
        );

        return $this->animal;
    }
}
