<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


new #[Title('admin/page_title.animals_index')]
class extends Component {

    use WithPagination;

    public string $app_title;
    public bool $openDeleteAnimal = false;
    public Animal $animalToDelete;

    public function mount(): void
    {
        $this->app_title = __('admin/animals.title');
    }

    #[Computed]
    public function animals()
    {
        return auth()
            ->user()
            ->animals()
            ->paginate(12)
            ->withPath(route('admin.animals.index', config('app.locale')));

    }

    public function openModal(string $modal, Animal $animal = null): void
    {
        if ($modal === 'delete-animal') {

            if ($animal !== null) {
                $this->animalToDelete = $animal;
            }

            $this->openDeleteAnimal = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openDeleteAnimal = false;
        $this->dispatch('close-modal');
    }
};
