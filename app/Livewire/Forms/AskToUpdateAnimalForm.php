<?php

namespace App\Livewire\Forms;

use App\Enums\SheetsStatus;
use App\Models\Animal;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AskToUpdateAnimalForm extends Form
{
    #[Validate('required')]
    public string $message;

    public function store(Animal $animal): void
    {
        $animal->animalSheets()->create([
            'user_id' => auth()->user()->id,
            'message' => $this->message,
            'status' => SheetsStatus::Modification->value,
            'date' => Carbon::now()
        ]);
    }
}
