<?php

use App\Enums\AdoptionRequestsStatus;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests_create')]
class extends Component {

    use WithPagination;

    public string $app_title;
    public Collection $animals;

    public function mount(): void
    {
        $this->app_title = __('admin/adoption-requests.create_title');
        $this->animals = Animal::all();
    }
};
