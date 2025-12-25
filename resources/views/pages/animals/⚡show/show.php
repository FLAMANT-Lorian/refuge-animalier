<?php

use App\Livewire\Forms\NoteCreateForm;
use App\Livewire\Forms\NoteEditForm;
use App\Models\Animal;
use App\Models\AnimalNote;
use App\Traits\RedirectToAnimalsPage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.animals_show')]
class extends Component {

    use WithPagination;
    use RedirectToAnimalsPage;

    public NoteCreateForm $createNoteForm;
    public NoteEditForm $editNoteForm;

    public Animal $animal;
    public string $app_title;
    public bool $openCreateNote = false;
    public bool $openEditNote = false;
    public bool $openDeleteNote = false;
    public bool $openUpdateRequest = false;

    public Animal $animalToAddNote;
    public AnimalNote $noteToEdit;
    public AnimalNote $noteToDelete;
    public Animal $animalToAskToUpdate;

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
        $this->app_title = __('admin/animals.show_title') . $this->animal->name;
    }

    public function createNote(): void
    {
        $this->createNoteForm->validate();

        $this->createNoteForm->store($this->animal);

        session()->flash('status', __('admin/animals.create_note_message'));

        $this->redirectToAnimalShowPage($this->animal);
    }

    public function editNote(int $id): void
    {

        $note = $this->animal->animalNotes()->findOrFail($id);

        $this->editNoteForm->validate();

        $this->editNoteForm->update($note);

        session()->flash('status', __('admin/animals.edit_note_message'));

        $this->redirectToAnimalShowPage($this->animal);
    }

    public function deleteNote(int $id): void
    {
        $note = $this->animal->animalNotes()->findOrFail($id);

        $note->delete();

        session()->flash('status', __('admin/animals.delete_note_message'));

        $this->redirectToAnimalShowPage($this->animal);
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
        if ($id !== null) {
            $note = $this->animal->animalNotes()->findOrFail($id);

            if ($modal === 'edit-note') {
                $this->editNoteForm->setNote($note);
                $this->openEditNote = true;
                $this->noteToEdit = $note;
            } else if ($modal === 'delete-note') {
                $this->noteToDelete = $note;
                $this->openDeleteNote = true;
            }
        } else {
            if ($modal === 'create-note') {
                $this->openCreateNote = true;
                $this->animalToAddNote = $this->animal;
            } else if ($modal === 'update-request') {
                $this->openUpdateRequest = true;
                $this->animalToAskToUpdate = $this->animal;
            }
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openCreateNote = false;
        $this->openEditNote = false;
        $this->openDeleteNote = false;
        $this->openUpdateRequest = false;
        $this->dispatch('close-modal');
    }
};
