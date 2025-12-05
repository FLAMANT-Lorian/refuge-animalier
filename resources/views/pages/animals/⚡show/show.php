<?php

use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public Animal $animal;
    public string $app_title;

    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
        $this->app_title = 'Fiche de ' . $this->animal->name;
    }

    #[Computed]
    public function notes(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'date' => '30 octobre 2026',
        ];
    }

};
