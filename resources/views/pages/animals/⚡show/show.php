<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {
    public Animal $animal;
    public string $app_title;
    public bool $openCreateNote = false;

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

    public function openModal(string $modal): void
    {
        if ($modal === 'create') {
            $this->openCreateNote = true;
            $this->dispatch('open-modal');
        }
    }

    #[On('close-modal-with-escape')]
    public function closeModal(): void
    {
        $this->openCreateNote = false;
        $this->dispatch('close-modal');
    }

};
