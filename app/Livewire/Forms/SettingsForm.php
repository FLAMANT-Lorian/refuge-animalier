<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Form;

class SettingsForm extends Form
{
    public User $user;

    public string $last_name;
    public string $first_name;
    public string $email;
    public ?string $postal_code;
    public ?string $address;
    public array $availability;
    public array $notifications;

    protected function rules(): array
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'postal_code' => 'int',
            'address' => 'string',
            'availability' => 'required|array',
            'availability.*' => 'string',
            'notifications' => 'required|array',
            'notifications.*' => 'bool',
        ];
    }

    public function setSettings(): void
    {
        $this->user = auth()->user();
        $this->last_name = $this->user->last_name;
        $this->first_name = $this->user->first_name;
        $this->email = $this->user->email;
        $this->postal_code = $this->user->postal_code ?? null;
        $this->address = $this->user->address ?? null;
        $this->availability = $this->user->availability;
        $this->notifications = $this->user->notifications;
    }

    public function update(): void
    {
        $this->user->update([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'postal_code' => $this->postal_code,
            'address' => $this->address,
            'availability' => $this->availability,
            'notifications' => $this->notifications
        ]);
    }
}
