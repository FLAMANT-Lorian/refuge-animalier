<?php

namespace App\Livewire\Forms;

use App\Enums\SheetsStatus;
use App\Models\AnimalSheet;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AskToCreateAnAnimalForm extends Form
{
    #[Validate('required')]
    public string $message;

    public function store(): void
    {
        AnimalSheet::create([
            'user_id' => auth()->user()->id,
            'message' => $this->message,
            'status' => SheetsStatus::Creation->value,
            'date' => Carbon::now(),
        ]);
    }
}
