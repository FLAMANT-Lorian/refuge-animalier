<?php

use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Models\User;
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
    public function volunteers()
    {
        return User::where('role', UserStatus::Volunteer)
            ->paginate(12)
            ->withPath(route('admin.volunteers.index', config('app.locale')));

    }

    #[Computed]
    public function getVolunteerCount(): int
    {
        return User::where('role', UserStatus::Volunteer->value)->count();
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
