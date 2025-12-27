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
    public bool $openSheetDelete = false;
    public AnimalSheet $sheetToSee;
    public AnimalSheet $sheetToDelete;

    public function mount(): void
    {
        $this->authorize('view-any', AnimalSheet::class);

        $this->app_title = __('admin/animal-sheets.title');
    }

    #[Computed]
    public function animal_sheets()
    {
        return AnimalSheet::paginate(12)
            ->withPath(route('admin.animal-sheets.index', config('app.locale')));

    }

    public function deleteSheet(int $id): void
    {
        $this->authorize('delete', AnimalSheet::class);

        $sheetToDelete = AnimalSheet::findOrFail($id);

        $sheetToDelete->delete();

        session()->flash('status', __('admin/animal-sheets.delete_flash_message'));

        $this->redirectRoute('admin.animal-sheets.index', ['locale' => app()->getLocale()], navigate: true);
    }

    public function changeStatus(int $id): void
    {
        $this->authorize('update', AnimalSheet::class);

        $sheet = AnimalSheet::findOrFail($id);

        $sheet->update(['status' => SheetsStatus::Validate->value]);

        $this->closeModal();
    }

    #[Computed]
    public function sheetsToValidateCount(): int
    {
        return AnimalSheet::whereIn('status', [SheetsStatus::Modification, SheetsStatus::Creation])->count();
    }

    public function openModal(string $modal, int $id): void
    {
        $sheet = AnimalSheet::findOrFail($id);

        if ($modal === 'sheet-message') {
            $this->openSheetMessage = true;
            $this->sheetToSee = $sheet;
        } elseif ($modal === 'delete-sheet') {
            $this->openSheetDelete = true;
            $this->sheetToDelete = $sheet;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openSheetMessage = false;
        $this->openSheetDelete = false;
        $this->dispatch('close-modal');
    }
};
