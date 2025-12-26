<?php

use App\Models\Animal;
use App\Traits\DeleteAnimal;
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
        return Animal::paginate(12)
            ->withPath(route('admin.animals.index', config('app.locale')));

    }

    #[Computed]
    public function getAnimalsCount()
    {
        return Animal::count();
    }

    public function delete(int $id): void
    {
        $this->authorize('delete', Animal::class);

        $this->deleteAnimal($id);

        $this->redirectToAnimalIndexPage();
    }

    public function openModal(string $modal, int $id): void
    {
        $animal = Animal::findOrFail($id);

        if ($modal === 'delete-animal') {
            $this->animalToDelete = $animal;
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
