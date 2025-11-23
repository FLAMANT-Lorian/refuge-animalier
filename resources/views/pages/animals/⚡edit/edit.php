<?php

use App\Models\Animal;
use Livewire\Component;

new class extends Component
{
    public Animal $animal;
    public function mount(Animal $animal): void
    {
        $this->animal = $animal;
    }
};
