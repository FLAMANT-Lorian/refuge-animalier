<?php

use App\Enums\AdoptionRequestsStatus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Demandes d’adoptions · Les pattes heureuses')]
class extends Component {

    use WithPagination;

    public string $app_title = "Demandes d’adoptions";

    #[Computed]
    public function adoption_requests(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'animal' => 'Pedro',
            'status' => AdoptionRequestsStatus::Closed->value
        ];

    }
};
