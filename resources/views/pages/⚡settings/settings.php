<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Paramètres · Les pattes heureuses')]
class extends Component {

    use WithPagination;

    public string $app_title = "Paramètres";
};
