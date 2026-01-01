<?php

use App\Livewire\Forms\EditVolunteerForm;
use App\Livewire\Forms\SettingsAvatarForm;
use App\Livewire\Forms\VolunteerAvatarForm;
use App\Models\User;
use App\Traits\HandleAvatar;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;


new #[Title('admin/page_title.volunteers_show')]
class extends Component {

    use WithFileUploads;
    use HandleAvatar;

    public string $app_title;
    public User $volunteer;

    public EditVolunteerForm $form;
    public VolunteerAvatarForm $avatarForm;

    public bool $openDeleteVolunteerAvatar = false;
    public bool $openDeleteVolunteer = false;

    public function mount(User $volunteer): void
    {
        $this->volunteer = $volunteer;
        $this->authorize('update', User::class);

        $this->app_title = __('admin/volunteers.show_title') . $this->volunteer->first_name;

        $this->avatarForm->setVolunteer($this->volunteer);
        $this->form->setVolunteer($this->volunteer);
    }

    public function save(): void
    {
        $this->authorize('update', User::class);

        $this->form->validate();

        $this->form->update();

        session()->flash('status', __('admin/volunteers.edit_flash_message'));

        $this->redirectRoute('admin.volunteers.edit', ['locale' => app()->getLocale(), 'volunteer' => $this->volunteer], navigate: true);
    }

    public function deleteVolunteer(): void
    {
        $this->authorize('delete', User::class);

        if ($this->volunteer->avatar_path) {
            $this->deleteAvatar($this->volunteer->avatar_path, $this->volunteer);
        }

        $this->volunteer->delete();

        session()->flash('status', __('admin/volunteers.delete_flash_message'));

        $this->redirectRoute('admin.volunteers.index', ['locale' => app()->getLocale()], navigate: true);
    }

    public function deleteAvatarFromStorage(): void
    {
        $this->authorize('update', User::class);

        $this->deleteAvatar($this->volunteer->avatar_path, $this->volunteer);

        $this->closeModal();
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
