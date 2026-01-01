<?php

use App\Livewire\Forms\AdoptionRequestCreateForm;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use Illuminate\Support\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.adoption_requests_create')]
class extends Component {

    use WithPagination;

    public string $app_title;
    public Collection $animals;

    public AdoptionRequestCreateForm $form;

    public function mount(): void
    {
        $this->authorize('create', AdoptionRequest::class);

        $this->app_title = __('admin/adoption-requests.create_title');
        $this->animals = Animal::orderBy('name')->get();

        $this->form->setForm();
    }

    public function save(): void
    {
        $this->authorize('create', AdoptionRequest::class);

        $this->form->validate();

        $this->form->store();

        session()->flash('status', __('admin/adoption-requests.create_flash_message'));

        $this->redirectRoute('admin.adoption-requests.index', [
            'locale' => app()->getLocale()
        ], navigate: true);
    }
};
