<?php

use App\Livewire\Forms\AnimalCreateForm;
use App\Models\Animal;
use App\Traits\CleanLivewireTMPFolder;
use App\Traits\getBreeds;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('admin/page_title.animals_create')]
class extends Component {

    use getBreeds;
    use WithFileUploads;
    use CleanLivewireTMPFolder;

    public string $app_title;

    public AnimalCreateForm $form;

    public bool $openAddBreed = false;

    public function mount(): void
    {
        $this->authorize('create', Animal::class);

        $this->app_title = __('admin/animals.create_title');

        $this->form->setAnimal();
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
            $this->openAddBreed = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openAddBreed = false;
        $this->dispatch('close-modal');
    }
};
