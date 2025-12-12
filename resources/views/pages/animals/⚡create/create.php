<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('animals_create')]
class extends Component {
    public string $app_title;

    public function mount(): void
    {
        $this->app_title = __('admin/animals.create_title');
    }

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
