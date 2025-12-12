<?php

use App\Models\Animal;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.animals_edit')]
class extends Component {
    public Animal $animal;
    public string $app_title;

    public bool $openAddBreed = false;
    public bool $openDeleteAnimal = false;
    public Animal $animalToDelete;

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
        $this->app_title = __('admin/animals.edit_title');
    }

    public function openModal(string $modal, Animal $animal = null): void
    {
        if ($modal === 'add-breed') {
            $this->openAddBreed = true;
        } elseif ($modal === 'delete-animal') {
            if ($animal !== null) {
                $this->animalToDelete = $animal;
            }

            $this->openDeleteAnimal = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openAddBreed = false;
        $this->openDeleteAnimal = false;
        $this->dispatch('close-modal');
    }
};
