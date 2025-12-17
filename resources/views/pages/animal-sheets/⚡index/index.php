<?php

use App\Enums\SheetsStatus;
use App\Models\AnimalSheet;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.animal_sheets')]
class extends Component {

    use WithPagination;

    public string $app_title;

    public bool $openSheetMessage = false;

    public function mount(): void
    {
        $this->app_title = __('admin/animal-sheets.title');
    }

    #[Computed]
    public function animal_sheets()
    {
        return AnimalSheet::paginate(12)
            ->withPath(route('admin.animal-sheets.index', config('app.locale')));

    }

    #[Computed]
    public function sheetsToValidateCount()
    {
        return AnimalSheet::whereIn('status', [SheetsStatus::Modification, SheetsStatus::Creation])->count();
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
