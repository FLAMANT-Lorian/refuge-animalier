<?php

use App\Enums\AdoptionRequestsStatus;
use App\Enums\SheetsStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\AnimalSheet;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;

new #[Title('admin/page_title.dashboard')]
class extends Component {

    public string $app_title = 'Tableau de bord';
    public Collection $adoption_requests;
    public int $sheet_count;
    public int $adoption_request_count;
    public bool $openEditAnimalSheet = false;
    public AnimalSheet $sheetToSee;

    public function mount(): void
    {
        $this->app_title = __('app_title');

        $this->sheet_count = AnimalSheet::whereIn('status', [
            SheetsStatus::Creation->value, SheetsStatus::Modification->value
        ])->count();

        $this->adoption_requests = AdoptionRequest::where('status', [
            AdoptionRequestsStatus::Awaiting->value
        ])->orderBy('created_at', 'desc')->get();

        $this->adoption_request_count = AdoptionRequest::where('status', [
            AdoptionRequestsStatus::Awaiting->value
        ])->count();
    }

    #[Computed]
    public function animal_sheets()
    {
        return AnimalSheet::whereIn('status', [
            SheetsStatus::Creation->value, SheetsStatus::Modification->value
        ])->orderBy('created_at', 'desc')->get();
    }

    public function changeStatus(int $id): void
    {
        $this->authorize('update', AnimalSheet::class);

        $sheet = AnimalSheet::findOrFail($id);

        $sheet->update(['status' => SheetsStatus::Validate->value]);

        $this->closeModal();
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

    public function openModal(string $modal, int $id): void
    {
        $sheet = AnimalSheet::findOrFail($id);

        if ($modal === 'animal-sheet') {
            $this->openEditAnimalSheet = true;
            $this->sheetToSee = $sheet;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openEditAnimalSheet = false;
        $this->dispatch('close-modal');
    }
};
