<?php

namespace App\Livewire\Forms;

use App\Enums\AdoptionRequestsStatus;
use App\Enums\YesOrNo;
use App\Models\Animal;
use App\Traits\CreateAdoptionRequestRules;
use Livewire\Form;

class AdoptionRequestCreateForm extends Form
{
    use CreateAdoptionRequestRules;

    public string $full_name;
    public string $email;
    public ?string $phone = null;
    public ?string $address = null;
    public ?int $postal_code = null;
    public string $message;
    public string $status;
    public string $animal;
    public ?string $housing = null;
    public string $outside_area;
    public string $children_at_home;
    public ?int $children_count = null;
    public string $animals_at_home;
    public ?string $animals_type = null;

    public function setForm(): void
    {
        $this->status = AdoptionRequestsStatus::InWay->value;
        $this->animal = Animal::orderBy('name')->first()->id;
        $this->outside_area = YesOrNo::No->value;
        $this->animals_at_home = YesOrNo::No->value;
        $this->children_at_home = YesOrNo::No->value;
    }

    public function store(): void
    {
        $animal = Animal::findOrFail($this->animal);

        $this->outside_area = !($this->outside_area === YesOrNo::No->value);
        $this->animals_at_home = !($this->animals_at_home === YesOrNo::No->value);
        $this->children_at_home = !($this->children_at_home === YesOrNo::No->value);

        $animal->adoptionRequests()->create([
            'full_name' => $this->full_name,
            'email' => $this->email,
            'message' => $this->message,
            'phone' => $this->phone,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'status' => $this->status,
            'housing' => $this->housing,
            'outdoor_area' => $this->outside_area,
            'children_at_home' => $this->children_at_home,
            'children_count' => $this->children_count,
            'animals_at_home' => $this->animals_at_home,
            'animals_type' => $this->animals_type,
        ]);
    }
}
