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
    public int $sheet_count;
    public int $adoption_request_count;
    public bool $openEditAnimalSheet = false;
    public AnimalSheet $sheetToSee;

    public function mount(): void
    {
        $this->app_title = __('app_title');

        $this->sheet_count = AnimalSheet::with(['animal', 'animal.breed', 'animal.breed.species', 'user'])->whereIn('status', [
            SheetsStatus::Creation->value, SheetsStatus::Modification->value
        ])->count();

        $this->adoption_request_count = AdoptionRequest::with(['animal', 'animal.breed', 'animal.breed.species',])->where('status', [
            AdoptionRequestsStatus::Awaiting->value
        ])->count();
    }

    #[Computed]
    public function animal_sheets()
    {
        return AnimalSheet::with(['animal', 'animal.breed', 'animal.breed.species', 'user'])->whereIn('status', [
            SheetsStatus::Creation->value, SheetsStatus::Modification->value
        ])->orderBy('created_at', 'desc')->get();
    }

    #[Computed]
    public function adoption_requests()
    {
        return AdoptionRequest::with(['animal', 'animal.breed', 'animal.breed.species'])->where('status', [
            AdoptionRequestsStatus::Awaiting->value
        ])->orderBy('created_at', 'desc')->get();
    }

    public function changeStatus(int $id): void
    {
        $this->authorize('update', AnimalSheet::class);

        $sheet = AnimalSheet::with(['animal', 'animal.breed', 'animal.breed.species', 'user'])->findOrFail($id);

        $sheet->update(['status' => SheetsStatus::Validate->value]);

        $this->closeModal();
    }

    public function openModal(string $modal, int $id): void
    {
        $sheet = AnimalSheet::with(['animal', 'user'])->findOrFail($id);

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
