<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Créer un animal · Les pattes heureuses')]
class extends Component {
    public string $app_title = "Créer une nouvelle fiche";

    public bool $openAddBreed = false;

    public function openModal(string $modal): void
    {
        if ($modal === 'add-breed') {
            $this->openAddBreed = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openAddBreed = false;
        $this->dispatch('close-modal');
    }
};
