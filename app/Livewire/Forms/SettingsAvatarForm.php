<?php

namespace App\Livewire\Forms;

use App\Traits\CleanLivewireTMPFolder;
use App\Traits\HandleAvatar;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class SettingsAvatarForm extends Form
{
    use HandleAvatar;
    use CleanLivewireTMPFolder;

    #[Validate('mimes:jpeg,png,gif,webp|max:2048')]
    public ?TemporaryUploadedFile $avatar = null;

    public function updatedAvatar(): void
    {
        if ($this->avatar) {
            $path = $this->generateSizedAvatar($this->avatar);

            auth()->user()->update([
                'avatar_path' => $path
            ]);

            $this->avatar = null;

            $this->cleanLivewireTMPFolder();
        }
    }
}
