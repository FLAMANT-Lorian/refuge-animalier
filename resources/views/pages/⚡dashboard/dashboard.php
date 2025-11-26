<?php

use App\Enums\SheetsStatus;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Tableau de bord · Les pattes heureuses')]
class extends Component {
    public string $app_title = 'Tableau de bord';
    public array $sheet = [
        'animal' => 'Moka',
        'date' => '30 octobre 2026',
        'breed' => 'Caniche',
        'state' => SheetsStatus::Creation->value
    ];
};
