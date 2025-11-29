<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


new #[Title('Animaux · Les pattes heureuses')]
class extends Component {

    use WithPagination;

    public string $app_title = "Animaux";

    #[Computed]
    public function animals()
    {
        return Animal::orderBy('created_at')
            ->paginate(12)
            ->withPath(route('admin.animals.index'));

    }
};
