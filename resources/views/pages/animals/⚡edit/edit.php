<?php

use App\Models\Animal;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Modifier la fiche de l’animal · Les pattes heureuses')]
class extends Component {
    public Animal $animal;
    public string $app_title = 'Modification de la fiche de l’animal';

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
    }
};
