<?php

use App\Livewire\Forms\AskToCreateAnAnimalForm;
use App\Livewire\Forms\AskToUpdateAnimalForm;
use App\Models\Animal;
use App\Models\AnimalSheet;
use App\Traits\DeleteAnimal;
use App\Traits\HandleAnimalsImages;
use App\Traits\PicturesHandling;
use App\Traits\RedirectToAnimalsPage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


new #[Title('admin/page_title.animals_index')]
class extends Component {

    use WithPagination;
    use DeleteAnimal;
    use RedirectToAnimalsPage;
    use HandleAnimalsImages;
    use RedirectToAnimalsPage;

    public string $app_title;

    public AskToUpdateAnimalForm $askToUpdateAnimalForm;
    public AskToCreateAnAnimalForm $askToCreateAnimalForm;
    public bool $openDeleteAnimal = false;
    public bool $openAskForUpdate = false;
    public bool $openAskForCreate = false;
    public Animal $animalToDelete;
    public Animal $animalToAskToUpdate;

    public function mount(): void
    {
        $this->app_title = __('admin/animals.title');
    }

    #[Computed]
    public function animals()
    {
        return Animal::paginate(12)
            ->withPath(route('admin.animals.index', config('app.locale')));

    }

    #[Computed]
    public function getAnimalsCount(): int
    {
        return Animal::count();
    }

    public function delete(int $id): void
    {
        $this->authorize('delete', Animal::class);

        $this->deleteAnimalsPictures($id);

        $this->deleteAnimal($id);

        $this->redirectToAnimalIndexPage();

        $this->closeModal();
    }

    public function askForCreation(): void
    {
        $this->authorize('create', AnimalSheet::class);

        $this->askToCreateAnimalForm->validate();

        $this->askToCreateAnimalForm->store();

        session()->flash('status', __('admin/animals.askForCreation'));

        $this->redirectToAnimalIndexPage();
    }

    public function askForUpdate(): void
    {
        $this->authorize('create', AnimalSheet::class);

        $this->askToUpdateAnimalForm->validate();

        $this->askToUpdateAnimalForm->store($this->animalToAskToUpdate);

        session()->flash('status', __('admin/animals.askForUpdate'));

        $this->redirectToAnimalIndexPage();
    }

    public function openModal(string $modal, int $id = null): void
    {
        if ($id !== null) {
            $animal = Animal::findOrFail($id);

            if ($modal === 'delete-animal') {
                $this->animalToDelete = $animal;
                $this->openDeleteAnimal = true;
            } else if ($modal === 'ask-for-update') {
                $this->openAskForUpdate = true;
                $this->animalToAskToUpdate = $animal;
            }
        } else {
            if ($modal === 'ask-for-create') {
                $this->openAskForCreate = true;
            }
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->resetValidation();

        $this->openDeleteAnimal = false;
        $this->openAskForUpdate = false;
        $this->openAskForCreate = false;
        $this->dispatch('close-modal');
    }
};
