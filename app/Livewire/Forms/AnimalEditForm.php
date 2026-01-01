<?php

namespace App\Livewire\Forms;

use App\Enums\AnimalStatus;
use App\Models\Animal;
use App\Traits\AnimalsEditRules;
use App\Traits\HandleAnimalsImages;
use Carbon\Carbon;
use Livewire\Form;

class AnimalEditForm extends Form
{
    use AnimalsEditRules;
    use HandleAnimalsImages;

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
            $this->addError('new_pictures', __('validation.max.array', ['attribute' => __('validation.attributes.pictures'), 'max' => 4]));
            return null;
        }

        $picturesDB = empty($this->pictures) ? [] : $this->pictures;

        foreach ($this->new_pictures as $picture) {
            $picturesDB[] = $this->generateSizedImages($picture);
        }

        $picturesDB = empty($picturesDB) ? null : $picturesDB;

        if ($this->state === AnimalStatus::Adopted->value) {
            $adopted_at = Carbon::now();
        }

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
                'adopted_at' => $adopted_at ?? null
            ]
        );

        return $this->animal;
    }
}
