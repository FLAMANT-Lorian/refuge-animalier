<?php

use App\Enums\AdoptionRequestsStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Traits\DeleteAdoptionRequest;
use App\Traits\IndexFilter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests')]
class extends Component {

    use WithPagination;
    use DeleteAdoptionRequest;
    use IndexFilter;

    public string $app_title;
    public bool $openAdoptionRequest = false;
    public bool $openDeleteAdoptionRequest = false;

    #[Url]
    public string $selected_filter = 'all';
    #[Url]
    public string $term = '';

    public AdoptionRequest $adoptionRequestToDelete;

    public function mount(): void
    {
        $this->authorize('view-any', AdoptionRequest::class);

        $this->app_title = __('admin/adoption-requests.title');
    }

    #[Computed]
    public function adoption_requests()
    {
        $query = AdoptionRequest::with(['animal']);

        $array_of_states = array_map(
            fn(AdoptionRequestsStatus $status) => $status->value,
            AdoptionRequestsStatus::cases()
        );

        // FILTRE DE BASE – SELECT
        if (in_array($this->selected_filter, $array_of_states)) {
            $query->where('status', $this->selected_filter);
        } else {
            $this->selected_filter = 'all';
        }

        // FILTRE DE COLONNE
        if (!is_null($this->filter_column)) {
            if ($this->filter_column === 'animal') {
                $query->join('animals', 'animals.id', '=', 'adoption_requests.animal_id')
                    ->orderBy('animals.name', $this->filter_direction)
                    ->select('adoption_requests.*');
            } else {
                $query->orderBy($this->filter_column, $this->filter_direction);
            }
        }

        // CHAMP DE RECHERCHE
        if (!empty($this->term)) {
            $query->whereLike('full_name', '%' . $this->term . '%');
        }

        return $query->paginate(12)
            ->withQueryString()
            ->withPath(route('admin.adoption-requests.index', [
                'selected_filter' => $this->selected_filter,
                'filter_column' => $this->filter_column,
                'filter_direction' => $this->filter_direction,
                'term' => $this->term,
                'locale' => config('app.locale'),
            ]));
    }

    public function delete(int $id): void
    {
        $this->deleteAdoptionRequest($id);
    }

    #[Computed]
    public function getAdoptionRequestsCount(): int
    {
        return AdoptionRequest::count();
    }

    public function openModal(string $modal, int $id): void
    {
        $adoption_request = AdoptionRequest::findOrFail($id);

        if ($modal === 'delete-adoption-request') {
            $this->adoptionRequestToDelete = $adoption_request;
            $this->openDeleteAdoptionRequest = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openAdoptionRequest = false;
        $this->openDeleteAdoptionRequest = false;
        $this->dispatch('close-modal');
    }
};
