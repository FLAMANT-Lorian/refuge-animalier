<?php

use App\Livewire\Forms\AskToUpdateAnimalForm;
use App\Livewire\Forms\NoteCreateForm;
use App\Livewire\Forms\NoteEditForm;
use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\AnimalSheet;
use App\Traits\IndexFilter;
use App\Traits\RedirectToAnimalsPage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.animals_show')]
class extends Component {

    use WithPagination;
    use RedirectToAnimalsPage;
    use IndexFilter;

    public NoteCreateForm $createNoteForm;
    public NoteEditForm $editNoteForm;

    public AskToUpdateAnimalForm $askToUpdateAnimalForm;

    public Animal $animal;
    public string $app_title;
    public bool $openCreateNote = false;
    public bool $openEditNote = false;
    public bool $openDeleteNote = false;
    public bool $openAskForUpdate = false;

    public Animal $animalToAddNote;
    public AnimalNote $noteToEdit;
    public AnimalNote $noteToDelete;
    public Animal $animalToAskToUpdate;

    #[Url]
    public ?string $filter_column = null;
    #[Url]
    public ?string $filter_direction = null;

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
        $this->app_title = __('admin/animals.show_title') . $this->animal->name;
    }

    #[Computed]
    public function notes()
    {
        $query = $this->animal->animalNotes()->with(['animal']);

        // FILTRE DE COLONNE
        if (!is_null($this->filter_column)) {
            $query->orderBy($this->filter_column, $this->filter_direction);
        }

        return $query->paginate(6)
            ->withPath(route('admin.animals.show', ['locale' => config('app.locale'), 'animal' => $this->animal]));
    }

    public function askForUpdate(): void
    {
        $this->authorize('create', AnimalSheet::class);

        $this->askToUpdateAnimalForm->validate();

        $this->askToUpdateAnimalForm->store($this->animal);

        session()->flash('status', __('admin/animals.askForUpdate'));

        $this->redirectToAnimalShowPage($this->animal);

    }

    public function createNote(): void
    {
        $this->authorize('create', AnimalNote::class);

        $this->createNoteForm->validate();

        $this->createNoteForm->store($this->animal);

        session()->flash('status', __('admin/animals.create_note_message'));

        $this->redirectToAnimalShowPage($this->animal);
    }

    public function editNote(int $id): void
    {
        $this->authorize('update', AnimalNote::class);

        $note = $this->animal->animalNotes()->findOrFail($id);

        $this->editNoteForm->validate();

        $this->editNoteForm->update($note);

        session()->flash('status', __('admin/animals.edit_note_message'));

        $this->redirectToAnimalShowPage($this->animal);
    }

    public function deleteNote(int $id): void
    {
        $this->authorize('delete', AnimalNote::class);

        $note = $this->animal->animalNotes()->findOrFail($id);

        $note->delete();

        session()->flash('status', __('admin/animals.delete_note_message'));

        $this->redirectToAnimalShowPage($this->animal);
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
            if ($modal === 'ask-for-update') {
                $this->openAskForUpdate = true;
                $this->animalToAskToUpdate = $this->animal;
            } else if ($modal === 'create-note') {
                $this->openCreateNote = true;
                $this->animalToAddNote = $this->animal;
            }
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openCreateNote = false;
        $this->openEditNote = false;
        $this->openDeleteNote = false;
        $this->openAskForUpdate = false;
        $this->dispatch('close-modal');
    }
};
