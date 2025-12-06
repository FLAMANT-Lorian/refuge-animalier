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

    public bool $openSheetMessage = false;

    #[Computed]
    public function animal_sheets(): array
    {
        return [
            'name' => 'Moka',
            'date' => '30 octobre 2026',
            'volunteer' => 'Flamant Lorian',
            'status' => SheetsStatus::Creation->value
        ];

    }

    public function openModal(string $modal): void
    {
        if ($modal === 'sheet-message') {
            $this->openSheetMessage = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openSheetMessage = false;
        $this->dispatch('close-modal');
    }
};
