<?php

use App\Livewire\Forms\AnimalEditForm;
use App\Models\Animal;
use App\Traits\CleanLivewireTMPFolder;
use App\Traits\DeleteAnimal;
use App\Traits\getBreeds;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use function PHPUnit\Framework\isEmpty;

new #[Title('admin/page_title.animals_edit')]
class extends Component {

    use getBreeds;
    use DeleteAnimal;
    use WithFileUploads;
    use CleanLivewireTMPFolder;

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

    public function removePicture(int $index, int $animal_index): void
    {
        $animal = Animal::findOrFail($animal_index);

        Storage::disk('public')->delete($this->form->pictures[$index]);

        unset($this->form->pictures[$index]);

        if (empty($this->form->pictures)) {
            $this->form->pictures = null;
        }


        $this->form->pictures = !empty($this->form->pictures) ? array_values($this->form->pictures) : null;

        $animal->update(['pictures' => $this->form->pictures]);

    }

    public function deleteImage(int $index): void
    {
        unset($this->form->new_pictures[$index]);
    }

    public function delete(int $id): void
    {
        $this->authorize('delete', Animal::class);

        $this->deleteAnimal($id);

        $this->redirectRoute('admin.animals.index', ['locale' => app()->getLocale()]);

        $this->closeModal();
    }

    public function save(): void
    {

        $this->authorize('update', Animal::class);

        $this->form->validate();

        $animal = $this->form->update();

        if (is_null($animal)) {
            return;
        }

        $this->cleanLivewireTMPFolder();

        session()->flash('status', __('admin/animals.edit_flash_message'));

        $this->redirectRoute('admin.animals.show', [
                'locale' => app()->getLocale(),
                'animal' => $animal
            ]
        );
    }

    public function openModal(string $modal, int $id = null): void
    {
        if ($modal === 'add-breed') {
            $this->openAddBreed = true;
        } elseif ($modal === 'delete-animal') {
            if ($id !== null) {
                $this->animalToDelete = Animal::findOrFail($id);
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
