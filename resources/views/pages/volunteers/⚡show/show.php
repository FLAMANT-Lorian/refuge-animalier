<?php

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;


new #[Title('admin/page_title.volunteers_show')]
class extends Component
{
    public string $app_title;

    public bool $openDeleteVolunteerAvatar = false;
    public bool $openDeleteVolunteer = false;

    public function mount(User $volunteer): void
    {
        $this->app_title = __('admin/volunteers.show_title') . $volunteer->first_name;
    }

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
