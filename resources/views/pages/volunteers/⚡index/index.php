<?php

use App\Enums\VolunteerStatus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.volunteers')]
class extends Component {

    use WithPagination;

    public string $app_title;

    public bool $openDeleteVolunteer = false;
    public bool $openDeleteVolunteerAvatar = false;

    public function mount(): void
    {
        $this->app_title = __('admin/volunteers.title');
    }

    #[Computed]
    public function volunteers(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'date' => '30 octobre 2026',
            'status' => VolunteerStatus::InBreak->value
        ];

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
