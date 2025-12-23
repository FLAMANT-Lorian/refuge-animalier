<?php

namespace App\Livewire\Forms;

use App\Models\Animal;
use App\Traits\AnimalsEditRules;
use Livewire\Form;

class AnimalEditForm extends Form
{
    use AnimalsEditRules;

    public Animal $animal;

    public string $name;
    public string $birth_date;
    public string $sex;
    public string $breed;
    public string $coat;
    public ?string $vaccines;
    public string $state;
    public string $character;
    public ?array $pictures = [];
    public ?array $new_pictures = [];

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
        $this->pictures = $animal->pictures;
    }

    public function update(): ?Animal
    {
        $total = count($this->pictures ?? []) + count($this->new_pictures ?? []);

        if ($total > 4) {
            $this->addError('new_pictures', 'Le champ photos ne doit pas contenir plus de 4 éléments.');
            return null;
        }

        $picturesDB = empty($this->pictures) ? [] : $this->pictures;

        foreach ($this->new_pictures as $picture) {
            $picturesDB[] = $picture->storeAs(
                'animals',
                uniqid() . '.' . $picture->getClientOriginalExtension(),
                'public'
            );
        }

        $picturesDB = empty($picturesDB) ? null : $picturesDB;

        $this->animal->update([
                'name' => $this->name,
                'breed_id' => $this->breed,
                'birth_date' => $this->birth_date,
                'sex' => $this->sex,
                'coat' => $this->coat,
                'vaccines' => $this->vaccines ?? null,
                'state' => $this->state,
                'pictures' => $picturesDB,
                'character' => $this->character,
            ]
        );

        return $this->animal;
    }
}
