<?php

use App\Livewire\Forms\ChangePasswordForm;
use App\Livewire\Forms\SettingsAvatarForm;
use App\Livewire\Forms\SettingsForm;
use App\Traits\HandleAvatar;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('admin/page_title.settings')]
class extends Component {

    use WithFileUploads;
    use HandleAvatar;

    public string $app_title;

    public bool $openDeleteAvatar = false;

    public SettingsForm $form;
    public SettingsAvatarForm $avatarForm;
    public ChangePasswordForm $changePasswordForm;

    public function mount(): void
    {
        $this->app_title = __('admin/settings.title');

        $this->form->setSettings();
    }

    public function changePassword(): void
    {
        $this->changePasswordForm->validate();

        $this->changePasswordForm->update();

        session()->flash('status', __('admin/settings.change_password_flash_message'));

        $this->redirectRoute('admin.settings', ['locale' => app()->getLocale()], navigate: true);
    }

    public function delete(): void
    {
        $this->deleteAvatar(auth()->user()->avatar_path);

        $this->redirectRoute('admin.settings', ['locale' => app()->getLocale()], navigate: true);
    }

    public function save(): void
    {
        $this->form->validate();

        $this->form->update();

        session()->flash('status', __('admin/settings.update_flash_message'));

        $this->redirectRoute('admin.settings', ['locale' => app()->getLocale()], navigate: true);
    }

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
