<?php

use App\Enums\AdoptionRequestsStatus;
use App\Enums\SheetsStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\AnimalSheet;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;

new #[Title('admin/page_title.dashboard')]
class extends Component {

    public string $app_title = 'Tableau de bord';
    public Collection $animal_sheets;
    public Collection $adoption_requests;
    public int $sheet_count;
    public int $adoption_request_count;
    public bool $openEditAnimalSheet = false;
    public bool $openAnimalAdoptionRequest = false;

    public function mount(): void
    {
        $this->app_title = __('app_title');

        $this->animal_sheets = AnimalSheet::whereIn('status', [
            SheetsStatus::Creation->value, SheetsStatus::Modification->value
        ])->get();

        $this->sheet_count = AnimalSheet::whereIn('status', [
            SheetsStatus::Creation->value, SheetsStatus::Modification->value
        ])->count();

        $this->adoption_requests = AdoptionRequest::where('status', [
            AdoptionRequestsStatus::Awaiting->value
        ])->get();

        $this->adoption_request_count = AdoptionRequest::where('status', [
            AdoptionRequestsStatus::Awaiting->value
        ])->count();
    }

    #[Computed]
    public function getStatsAnimalCount(): int
    {
        return Animal::count();
    }

    #[Computed]
    public function getStatsSuccessAdoptionsCount(): int
    {
        return Animal::where('adopted_at', '!=', null)->count();
    }

    #[Computed]
    public function getStatsNewAnimalsCount(): int
    {
        return Animal::where('created_at', '>', Carbon::now()->subMonths())->count();
    }

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
