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

    public bool $openMessage = false;
    public bool $openDeleteMessage = false;

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

    public function openModal(string $modal): void
    {
        if ($modal === 'message') {
            $this->openMessage = true;
        } elseif ($modal === 'delete-message') {
            $this->openDeleteMessage = true;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openMessage = false;
        $this->openDeleteMessage = false;
        $this->dispatch('close-modal');
    }
};
