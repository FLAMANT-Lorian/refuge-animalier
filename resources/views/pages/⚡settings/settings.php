<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Paramètres · Les pattes heureuses')]
class extends Component {

    public string $app_title = "Paramètres";

    public bool $openDeleteAvatar = false;

    public function openModal(string $modal): void
    {
        if ($modal === 'delete-user-avatar') {
            $this->openDeleteAvatar = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openDeleteAvatar = false;
        $this->dispatch('close-modal');
    }
};
