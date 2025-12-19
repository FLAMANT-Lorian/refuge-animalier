<?php

use App\Enums\AdoptionRequestsStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests_edit')]
class extends Component {

    use WithPagination;

    public string $app_title;
    public AdoptionRequest $adoption_request;

    public function mount(AdoptionRequest $adoption_request): void
    {
        $this->adoption_request = $adoption_request;
        $this->app_title = __('admin/adoption-requests.edit_title') . $this->adoption_request->animal->name;
    }
};
