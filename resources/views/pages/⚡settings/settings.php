<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.settings')]
class extends Component {

    public string $app_title;

    public bool $openDeleteAvatar = false;

    public function mount(): void
    {
        $this->app_title = __('admin/settings.title');
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
