<?php

namespace App\Livewire\Forms;

use App\Enums\AdoptionRequestsStatus;
use App\Enums\YesOrNo;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Traits\CreateAdoptionRequestRules;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AdoptionRequestEditForm extends Form
{
    use CreateAdoptionRequestRules;

    public AdoptionRequest $adoptionRequest;
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

    public function setAdoptionRequest(AdoptionRequest $adoptionRequest): void
    {
        $this->adoptionRequest = $adoptionRequest;
        $this->full_name = $adoptionRequest->full_name;
        $this->email = $adoptionRequest->email;
        $this->phone = $adoptionRequest->phone ?? null;
        $this->address = $adoptionRequest->address ?? null;
        $this->postal_code = $adoptionRequest->postal_code ?? null;
        $this->message = $adoptionRequest->message;
        $this->status = $adoptionRequest->status;
        $this->animal = $adoptionRequest->animal->id;
        $this->housing = $adoptionRequest->housing ?? null;
        $this->outside_area = $adoptionRequest->outdoor_area ? YesOrNo::Yes->value : YesOrNo::No->value;
        $this->children_at_home = $adoptionRequest->children_at_home ? YesOrNo::Yes->value : YesOrNo::No->value;
        $this->children_count = $adoptionRequest->children_count ?? null;
        $this->animals_at_home = $adoptionRequest->animals_at_home ? YesOrNo::Yes->value : YesOrNo::No->value;
        $this->animals_type = $adoptionRequest->animals_type ?? null;
    }

    public function update(): void
    {
        $this->outside_area = !($this->outside_area === YesOrNo::No->value);
        $this->animals_at_home = !($this->animals_at_home === YesOrNo::No->value);
        $this->children_at_home = !($this->children_at_home === YesOrNo::No->value);

        $this->adoptionRequest->update([
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
