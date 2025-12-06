<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


new #[Title('Animaux · Les pattes heureuses')]
class extends Component {

    use WithPagination;


    public string $app_title = "Animaux";
    public bool $openDeleteAnimal = false;
    public Animal $animalToDelete;

    #[Computed]
    public function animals()
    {
        return Animal::orderBy('created_at')
            ->paginate(12)
            ->withPath(route('admin.animals.index'));

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
