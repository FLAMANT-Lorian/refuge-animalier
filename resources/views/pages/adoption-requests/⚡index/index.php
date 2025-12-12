<?php

use App\Enums\AdoptionRequestsStatus;
use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests')]
class extends Component {

    use WithPagination;

    public string $app_title;
    public bool $openAdoptionRequest = false;
    public bool $openDeleteAdoptionRequest = false;
    public Animal $animalToBeAdopted;

    public function mount(): void
    {
        $this->app_title = __('admin/adoption-requests.title');
    }

    #[Computed]
    public function adoption_requests(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'animal' => 'Pedro',
            'status' => AdoptionRequestsStatus::Closed->value
        ];
    }

    public function openModal(string $modal): void
    {
        if ($modal === 'adoption-request') {
            $this->openAdoptionRequest = true;
        } elseif ($modal === 'delete-adoption-request') {
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
