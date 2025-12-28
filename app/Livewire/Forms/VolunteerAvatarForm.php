<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Traits\CleanLivewireTMPFolder;
use App\Traits\HandleAvatar;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class VolunteerAvatarForm extends Form
{
    use HandleAvatar;
    use CleanLivewireTMPFolder;

    #[Validate('mimes:jpeg,png,gif,webp|max:2048')]
    public ?TemporaryUploadedFile $avatar = null;

    public User $volunteer;

    public function setVolunteer(User $volunteer): void
    {
        $this->volunteer = $volunteer;
    }

    public function updatedAvatar(): void
    {
        if ($this->avatar) {
            if ($this->volunteer->avatar_path) {
                $old_file = $this->volunteer->avatar_path;
                $this->deleteAvatar($old_file, $this->volunteer);
            }

            $path = $this->generateSizedAvatar($this->avatar);


            $this->volunteer->update([
                'avatar_path' => $path
            ]);

            $this->avatar = null;

            $this->cleanLivewireTMPFolder();
        }
    }
}
