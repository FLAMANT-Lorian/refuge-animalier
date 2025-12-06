<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Créer un bénévole · Les pattes heureuses')]
class extends Component {

    public string $app_title = "Créer un profil bénévole";

    public bool $openDeleteVolunteerAvatar = false;

    public function openModal(string $modal): void
    {
        if ($modal === 'delete-volunteer-avatar') {
            $this->openDeleteVolunteerAvatar = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openDeleteVolunteerAvatar = false;
        $this->dispatch('close-modal');
    }
};
