<?php

namespace App\Livewire\Forms;

use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Models\User;
use App\Traits\HandleAvatar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CreateVolunteerForm extends Form
{
    use HandleAvatar;

    public string $last_name;
    public string $first_name;
    public string $email;
    public ?string $postal_code = null;
    public ?string $address = null;
    public string $status;
    public array $availability;
    public string $password;
    public ?TemporaryUploadedFile $avatar = null;

    public function rules(): array
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'postal_code' => 'nullable|int',
            'address' => 'nullable',
            'status' => ['required', Rule::enum(VolunteerStatus::class)],
            'availability' => 'array|required',
            'availability.*' => 'nullable',
            'password' => 'min:6',
            'avatar' => 'nullable|mimes:jpeg,png,gif,webp|max:2048'
        ];
    }

    public function setVolunteer(): void
    {
        $this->status = VolunteerStatus::Active->value;
        $this->availability = [
            'monday' => '',
            'tuesday' => '',
            'wednesday' => '',
            'thursday' => '',
            'friday' => '',
            'saturday' => '',
            'sunday' => '',
        ];
    }

    public function store(): void
    {
        if ($this->avatar) {
            $avatar_path = $this->generateSizedAvatar($this->avatar);
        } else {
            $avatar_path = null;
        }

        User::create([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'avatar_path' => $avatar_path,
            'address' => $this->address ?? null,
            'postal_code' => $this->postal_code ?? null,
            'notifications' => null,
            'availability' => $this->availability,
            'role' => UserStatus::Volunteer->value,
            'status' => $this->status,
            'password' => Hash::make($this->password),
        ]);
    }
}
