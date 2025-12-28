<?php

namespace App\Livewire\Forms;

use App\Enums\VolunteerStatus;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Form;

class EditVolunteerForm extends Form
{
    public User $volunteer;
    public string $last_name;
    public string $first_name;
    public string $email;
    public ?string $postal_code = null;
    public ?string $address = null;
    public string $status;
    public array $availability;

    public function rules(): array
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->volunteer->id)],
            'postal_code' => 'nullable|int',
            'address' => 'nullable',
            'status' => ['required', Rule::enum(VolunteerStatus::class)],
            'availability' => 'required|array',
            'availability.*' => 'nullable',
        ];
    }

    public function setVolunteer(User $volunteer): void
    {
        $this->volunteer = $volunteer;
        $this->last_name = $volunteer->last_name;
        $this->first_name = $volunteer->first_name;
        $this->email = $volunteer->email;
        $this->postal_code = $volunteer->postal_code;
        $this->address = $volunteer->address;
        $this->status = $volunteer->status;
        $this->availability = $volunteer->availability;
    }

    public function update()
    {
        $this->volunteer->update([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'postal_code' => $this->postal_code,
            'address' => $this->address,
            'status' => $this->status,
            'availability' => $this->availability
        ]);

        return $this->volunteer;
    }
}
