<?php

use App\Livewire\Forms\AnimalCreateForm;
use App\Traits\getBreeds;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('admin/page_title.animals_create')]
class extends Component {

    use getBreeds;

    public string $app_title;

    public AnimalCreateForm $form;

    public bool $openAddBreed = false;

    public function mount(): void
    {
        $this->app_title = __('admin/animals.create_title');

        $this->form->setAnimal();
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
