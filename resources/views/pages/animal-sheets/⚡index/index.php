<?php

use App\Enums\AnimalStatus;
use App\Enums\SheetsStatus;
use App\Models\AnimalSheet;
use App\Traits\IndexFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.animal_sheets')]
class extends Component {

    use WithPagination;
    use IndexFilter;

    public string $app_title;

    #[Url]
    public string $selected_filter = 'all';
    #[Url]
    public string $term = '';

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
        $query = AnimalSheet::with(['user', 'animal']);

        $array_of_states = array_map(
            fn(SheetsStatus $status) => $status->value,
            SheetsStatus::cases()
        );

        // FILTRE DE BASE – SELECT
        if (in_array($this->selected_filter, $array_of_states)) {
            $query->where('animal_sheets.status', $this->selected_filter);
        } else {
            $this->selected_filter = 'all';
        }

        // FILTRE DE COLONNE
        if (!is_null($this->filter_column)) {
            if ($this->filter_column === 'volunteer') {
                $query->join('users', 'users.id', '=', 'animal_sheets.user_id')
                    ->orderBy('users.last_name', $this->filter_direction)
                    ->select('animal_sheets.*');
            } elseif ($this->filter_column === 'animal') {
                $query->join('animals', 'animals.id', '=', 'animal_sheets.animal_id')
                    ->orderBy('animals.name', $this->filter_direction)
                    ->select('animal_sheets.*');
            } else {
                $query->orderBy($this->filter_column, $this->filter_direction);
            }
        }

        // CHAMP DE RECHERCHE
        if (!empty($this->term)) {
            $query->whereHas('user', function ($q) {
                $q->whereLike('last_name', '%' . $this->term . '%');
            });
        }

        return $query->paginate(12)
            ->withPath(route('admin.animal-sheets.index', [
                'selected_filter' => $this->selected_filter,
                'filter_column' => $this->filter_column,
                'filter_direction' => $this->filter_direction,
                'term' => $this->term,
                'locale' => config('app.locale'),
            ]));

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
