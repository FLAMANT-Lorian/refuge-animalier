<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Animal · Les pattes heureuses')]
class extends Component {
    public Animal $animal;
    public string $app_title;
    public bool $openCreateNote = false;
    public bool $openEditNote = false;
    public bool $openDeleteNote = false;
    public Animal $animalToAddNote;
    public Animal $animalToEditNote;
    public Animal $animalToDeleteNote;

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
        $this->app_title = 'Fiche de ' . $this->animal->name;
    }

    #[Computed]
    public function notes(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'date' => '30 octobre 2026',
        ];
    }

    public function openModal(string $modal, Animal $animal = null): void
    {
        if ($animal !== null) {
            $this->animalToAddNote = $animal;

            if ($modal === 'create-note') {
                $this->openCreateNote = true;
            } else if ($modal === 'edit-note') {
                $this->openEditNote = true;
            } else if ($modal === 'delete-note') {
                $this->openDeleteNote = true;
            }
        }

        $this->dispatch('open-modal');
    }

    #[On('close-modal-with-escape')]
    public function closeModal(): void
    {
        $this->openCreateNote = false;
        $this->openEditNote = false;
        $this->openDeleteNote = false;
        $this->dispatch('close-modal');
    }
};
