<?php

use App\Enums\AdoptionRequestsStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Traits\DeleteAdoptionRequest;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests')]
class extends Component {

    use WithPagination;
    use DeleteAdoptionRequest;

    public string $app_title;
    public bool $openAdoptionRequest = false;
    public bool $openDeleteAdoptionRequest = false;

    public AdoptionRequest $adoptionRequestToDelete;

    public function mount(): void
    {
        $this->app_title = __('admin/adoption-requests.title');
    }

    #[Computed]
    public function adoption_requests()
    {
        return AdoptionRequest::paginate(12)
            ->withPath(route('admin.adoption-requests.index', config('app.locale')));
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
