<?php

namespace App\Traits;

use App\Models\Breed;
use Livewire\Attributes\Computed;

trait getBreeds
{
    #[Computed]
    public function breeds()
    {
        return Breed::with(['species'])->orderBy('name')->get();
    }
}
