<?php

use Livewire\Attributes\Title;
use Livewire\Component;


new #[Title('Bénévoles · Les pattes heureuses')]
class extends Component
{
    public string $app_title = "Profil de Flamant Lorian";

    public bool $openDeleteVolunteerAvatar = false;
    public bool $openDeleteVolunteer = false;

    public function openModal(string $modal): void
    {
        if ($modal === 'delete-volunteer') {
            $this->openDeleteVolunteer = true;
        } elseif ($modal === 'delete-volunteer-avatar') {
            $this->openDeleteVolunteerAvatar = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openDeleteVolunteer = false;
        $this->openDeleteVolunteerAvatar = false;
        $this->dispatch('close-modal');
    }
};
