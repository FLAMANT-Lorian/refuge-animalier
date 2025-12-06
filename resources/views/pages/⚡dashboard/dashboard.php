<?php

use App\Enums\SheetsStatus;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Tableau de bord · Les pattes heureuses')]
class extends Component {

    public string $app_title = 'Tableau de bord';
    public bool $openEditAnimalSheet = false;
    public bool $openAnimalAdoptionRequest = false;
    public array $sheet = [
        'name' => 'Moka',
        'date' => '30 octobre 2026',
        'breed' => 'Caniche',
        'state' => SheetsStatus::Creation->value
    ];

    public array $adoptions_requests = [
        'name' => 'Flamant Lorian',
        'email' => 'flamantlorian@example.be',
        'animal_name' => 'Moka'
    ];

    public function openModal(string $modal): void
    {
        if ($modal === 'animal-sheet') {
            $this->openEditAnimalSheet = true;
        } else if ($modal === 'adoption-request') {
            $this->openAnimalAdoptionRequest = true;
        }

        $this->dispatch('open-modal');
    }
    public function closeModal(): void
    {
        $this->openEditAnimalSheet = false;
        $this->openAnimalAdoptionRequest = false;
        $this->dispatch('close-modal');
    }
};
