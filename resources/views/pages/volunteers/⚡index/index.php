<?php

use App\Enums\VolunteerStatus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Bénévoles · Les pattes heureuses')]
class extends Component {

    use WithPagination;

    public string $app_title = "Bénévoles";

    #[Computed]
    public function volunteers(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'date' => '30 octobre 2026',
            'status' => VolunteerStatus::InBreak->value
        ];

    }
};
