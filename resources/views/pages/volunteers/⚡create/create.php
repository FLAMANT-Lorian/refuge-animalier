<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.volunteers_create')]
class extends Component {

    public string $app_title;

    public bool $openDeleteVolunteerAvatar = false;

    public function mount(): void
    {
        $this->app_title = __('admin/volunteers.create_title');
    }

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
