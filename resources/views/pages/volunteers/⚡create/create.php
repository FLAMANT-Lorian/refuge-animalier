<?php

use App\Livewire\Forms\CreateVolunteerForm;
use App\Models\User;
use App\Traits\CleanLivewireTMPFolder;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('admin/page_title.volunteers_create')]
class extends Component {

    use WithFileUploads;
    use CleanLivewireTMPFolder;

    public string $app_title;

    public bool $openDeleteVolunteerAvatar = false;

    public CreateVolunteerForm $volunteerForm;

    public function mount(): void
    {
        $this->authorize('create', User::class);

        $this->app_title = __('admin/volunteers.create_title');

        $this->volunteerForm->setVolunteer();
    }

    public function save(): void
    {
        $this->authorize('create', User::class);

        $this->volunteerForm->validate();

        $this->volunteerForm->store();

        $this->cleanLivewireTMPFolder();

        session()->flash('status', __('admin/volunteers.create_flash_message'));

        $this->redirectRoute('admin.volunteers.index', ['locale' => app()->getLocale()], navigate: true);
    }

    public function deleteAvatarFromStorage(): void
    {
        $this->volunteerForm->avatar = null;

        $this->cleanLivewireTMPFolder();

        $this->closeModal();
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
