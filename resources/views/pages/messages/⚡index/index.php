<?php

use App\Enums\MessageStatus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Messages · Les pattes heureuses')]
class extends Component {

    use WithPagination;

    public string $app_title = "Messages";

    #[Computed]
    public function messages(): array
    {
        return [
            'name' => 'Flamant Lorian',
            'email' => 'lorianflamant@example.be',
            'date' => '30 octobre 2026',
            'hour' => '15h32',
            'status' => MessageStatus::read->value
        ];

    }
};
