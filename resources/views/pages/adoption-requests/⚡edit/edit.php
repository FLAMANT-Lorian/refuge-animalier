<?php

use App\Enums\AdoptionRequestsStatus;
use App\Livewire\Forms\AdoptionRequestEditForm;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Traits\DeleteAdoptionRequest;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests_edit')]
class extends Component {

    use WithPagination;
    use DeleteAdoptionRequest;

    public string $app_title;
    public AdoptionRequest $adoption_request;

    public AdoptionRequestEditForm $form;

    public AdoptionRequest $adoptionRequestToDelete;
    public bool $openDeleteAdoptionRequest;

    public function mount(AdoptionRequest $adoption_request): void
    {
        $this->authorize('update', AdoptionRequest::class);

        $this->adoption_request = $adoption_request;
        $this->app_title = __('admin/adoption-requests.edit_title') . $this->adoption_request->animal->name;

        $this->form->setAdoptionRequest($this->adoption_request);
    }

    public function delete(int $id): void
    {
        $this->deleteAdoptionRequest($id);
    }

    public function save(): void
    {
        $this->authorize('update', AdoptionRequest::class);

        $this->form->validate();

        $this->form->update();

        session()->flash('status', __('admin/adoption-requests.edit_flash_message'));

        $this->redirectRoute('admin.adoption-requests.edit', [
            'locale' => app()->getLocale(), 'adoption_request' => $this->adoption_request
        ], navigate: true);
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
        $this->openDeleteAdoptionRequest = false;
        $this->dispatch('close-modal');
    }
};
