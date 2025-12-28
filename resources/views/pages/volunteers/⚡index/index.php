<?php

use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Models\User;
use App\Traits\HandleAvatar;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.volunteers')]
class extends Component {

    use WithPagination;
    use HandleAvatar;

    public string $app_title;

    public bool $openDeleteVolunteer = false;
    public User $volunteerToDelete;

    public function mount(): void
    {
        $this->authorize('view', User::class);

        $this->app_title = __('admin/volunteers.title');
    }

    public function deleteVolunteer(int $id): void
    {
        $volunteer = User::findOrFail($id);

        $this->authorize('delete', User::class);

        if ($volunteer->avatar_path) {
            $this->deleteAvatar($volunteer->avatar_path, $volunteer);
        }

        $volunteer->delete();

        session()->flash('status', __('admin/volunteers.delete_flash_message'));

        $this->redirectRoute('admin.volunteers.index', ['locale' => app()->getLocale()], navigate: true);
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

    public function openModal(string $modal, int $id): void
    {
        $volunteer = User::findOrFail($id);

        if ($modal === 'delete-volunteer') {
            $this->openDeleteVolunteer = true;
            $this->volunteerToDelete = $volunteer;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openDeleteVolunteer = false;
        $this->dispatch('close-modal');
    }
};
