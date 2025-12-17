<?php

use App\Enums\MessageStatus;
use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/messages.title')]
class extends Component {

    use WithPagination;

    public string $app_title;

    public bool $openMessage = false;
    public bool $openDeleteMessage = false;

    public Message $messageModal;

    public function mount(): void
    {
        $this->app_title = __('admin/messages.title');
    }

    #[Computed]
    public function messages()
    {
        return Message::paginate(12)
            ->withPath(route('admin.messages.index', config('app.locale')));

    }

    #[Computed]
    public function getUnreadMessageCount(): int
    {
        return Message::where('status', MessageStatus::Unread->value)->count();
    }

    public function openModal(string $modal, Message $message = null): void
    {
        if ($message !== null) {
            $this->messageModal = $message;
        }

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
