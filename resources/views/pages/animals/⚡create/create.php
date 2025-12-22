<?php

use App\Livewire\Forms\AnimalCreateForm;
use App\Models\Animal;
use App\Models\Breed;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.animals_create')]
class extends Component {
    public string $app_title;

    public AnimalCreateForm $form;

    public function mount(): void
    {
        $this->app_title = __('admin/animals.create_title');

        $this->form->setAnimal();
    }

    #[Computed]
    public function breeds()
    {
        return Breed::all();
    }

    public function save(): void
    {
        $this->form->validate();

        $animal = $this->form->store();

        redirect(route('admin.animals.show', [
                'locale' => app()->getLocale(),
                'animal' => $animal
            ]
        ));
    }

    public bool $openAddBreed = false;

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
