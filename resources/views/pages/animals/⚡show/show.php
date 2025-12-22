<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.animals_show')]
class extends Component {

    use WithPagination;

    public Animal $animal;
    public string $app_title;
    public bool $openCreateNote = false;
    public bool $openEditNote = false;
    public bool $openDeleteNote = false;
    public bool $openUpdateRequest = false;
    public Animal $animalToAddNote;
    public Animal $animalToEditNote;
    public Animal $animalToDeleteNote;
    public Animal $animalToAskToUpdate;

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
        $this->app_title = __('admin/animals.show_title') . $this->animal->name;
    }

    #[Computed]
    public function notes()
    {
        return $this->animal
            ->animalNotes()
            ->paginate(6)
            ->withPath(route('admin.animals.show', ['locale' => config('app.locale'), 'animal' => $this->animal]));
    }

    public function openModal(string $modal, int $id = null): void
    {
        $animal = Animal::findOrFail($id);

        if ($animal !== null) {

            if ($modal === 'create-note') {
                $this->animalToAddNote = $animal;
                $this->openCreateNote = true;
            } else if ($modal === 'edit-note') {
                $this->animalToEditNote = $animal;
                $this->openEditNote = true;
            } else if ($modal === 'delete-note') {
                $this->animalToDeleteNote = $animal;
                $this->openDeleteNote = true;
            } else if ($modal === 'update-request') {
                $this->animalToAskToUpdate = $animal;
                $this->openUpdateRequest = true;
            }
        }

        $this->dispatch('open-modal');
    }

    #[On('close-modal-with-escape')]
    public function closeModal(): void
    {
        $this->openCreateNote = false;
        $this->openEditNote = false;
        $this->openDeleteNote = false;
        $this->openUpdateRequest = false;
        $this->dispatch('close-modal');
    }
};
