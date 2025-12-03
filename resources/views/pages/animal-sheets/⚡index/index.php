<?php

use App\Enums\SheetsStatus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Gestion des fiches · Les pattes heureuses')]
class extends Component {

    use WithPagination;

    public string $app_title = 'Gestion des fiches';

    #[Computed]
    public function animal_sheets(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'date' => '30 octobre 2026',
            'volunteer' => 'Flamant Lorian',
            'status' => SheetsStatus::Creation->value
        ];

    }
};
