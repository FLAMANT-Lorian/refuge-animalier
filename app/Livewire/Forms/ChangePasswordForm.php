<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChangePasswordForm extends Form
{
    #[Validate('required|current_password')]
    public string $old_password;

    #[Validate('required|min:6|different:old_password')]
    public string $new_password;

    public function update(): void
    {
        auth()->user()->update([
            'password' => Hash::make($this->new_password),
        ]);
    }
}
