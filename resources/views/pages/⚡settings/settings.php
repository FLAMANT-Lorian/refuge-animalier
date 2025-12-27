<?php

use App\Livewire\Forms\SettingsForm;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.settings')]
class extends Component {

    public string $app_title;

    public bool $openDeleteAvatar = false;

    public SettingsForm $form;

    public function mount(): void
    {
        $this->app_title = __('admin/settings.title');

        $this->form->setSettings();
    }

    public function save(): void
    {
        $this->form->validate();

        $this->form->update();

        session()->flash('status', 'Votre profil à bien été mis à jour !');

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
