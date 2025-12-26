<?php

use App\Livewire\Forms\AnimalCreateForm;
use App\Livewire\Forms\BreedCreateForm;
use App\Models\Animal;
use App\Traits\AddBreed;
use App\Traits\CleanLivewireTMPFolder;
use App\Traits\getBreeds;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('admin/page_title.animals_create')]
class extends Component {

    use getBreeds;
    use WithFileUploads;
    use CleanLivewireTMPFolder;
    use AddBreed;

    public string $app_title;

    public AnimalCreateForm $form;
    public BreedCreateForm $breedForm;

    public bool $openAddBreed = false;

    public function mount(): void
    {
        $this->authorize('create', Animal::class);

        $this->app_title = __('admin/animals.create_title');

        $this->form->setAnimal();

        $this->breedForm->setSpecies();
    }

    public function addBreed(): void
    {
        $this->addBreedModal($this->breedForm);
    }

    public function deleteImage(int $index): void
    {
        unset($this->form->pictures[$index]);
    }

    public function save(): void
    {
        $this->authorize('create', Animal::class);

        $this->form->validate();

        $animal = $this->form->store();

        $this->cleanLivewireTMPFolder();

        session()->flash('status', __('admin/animals.create_flash_message'));

        $this->redirectRoute('admin.animals.show', [
            'locale' => app()->getLocale(),
            'animal' => $animal
        ],
            navigate: true
        );
    }

    public function openModal(string $modal): void
    {
        if ($modal === 'add-breed') {
            $this->breedForm->setSpecies();
            $this->openAddBreed = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openAddBreed = false;

        $this->breedForm->resetValidation();

        $this->dispatch('close-modal');
    }
};
