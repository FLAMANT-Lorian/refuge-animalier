<?php

namespace App\Livewire\Forms;

use App\Models\Animal;
use App\Models\AnimalNote;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NoteCreateForm extends Form
{
    #[Validate('required')]
    public string $full_name;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required')]
    public string $message;

    #[Validate('required|date_format:Y-m-d')]
    public string $visit_date;


    public function store(Animal $animal): AnimalNote
    {
        return $animal->animalNotes()->create([
            'full_name' => $this->full_name,
            'email' => $this->email,
            'note' => $this->message,
            'visit_date' => $this->visit_date
        ]);
    }
}
