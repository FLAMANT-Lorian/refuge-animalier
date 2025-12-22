<?php

use App\Livewire\Forms\AnimalEditForm;
use App\Models\Animal;
use App\Traits\getBreeds;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.animals_edit')]
class extends Component {

    use getBreeds;

    public AnimalEditForm $form;

    public Animal $animal;

    public string $app_title;

    public bool $openAddBreed = false;
    public bool $openDeleteAnimal = false;
    public Animal $animalToDelete;

    public function mount(Animal $animal): void
    {
        $this->authorize('update', Animal::class);

        $this->animal = $animal;
        $this->app_title = __('admin/animals.edit_title');

        $this->form->setAnimal($this->animal);
    }

    public function save(): void
    {

        $this->authorize('update', Animal::class);

        $this->form->validate();

        $animal = $this->form->update();

        session()->flash('status', __('admin/animals.edit_flash_message'));

        $this->redirectRoute('admin.animals.show', [
                'locale' => app()->getLocale(),
                'animal' => $animal
            ]
        );
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
