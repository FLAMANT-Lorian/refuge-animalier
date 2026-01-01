<?php

use App\Enums\MessageStatus;
use App\Models\Message;
use App\Traits\IndexFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/messages.title')]
class extends Component {

    use WithPagination;
    use IndexFilter;

    public string $app_title;

    public bool $openMessage = false;
    public bool $openDeleteMessage = false;
    public Message $messageModal;

    #[Url]
    public string $selected_filter = 'all';
    #[Url]
    public string $term = '';

    public function mount(): void
    {
        $this->authorize('view', Message::class);

        $this->app_title = __('admin/messages.title');
    }

    #[Computed]
    public function messages()
    {
        $query = Message::query();

        $array_of_states = array_map(
            fn(MessageStatus $status) => $status->value,
            MessageStatus::cases()
        );

        // FILTRE DE BASE – SELECT
        if (in_array($this->selected_filter, $array_of_states)) {
            $query->where('status', $this->selected_filter);
        } else {
            $this->selected_filter = 'all';
        }

        // FILTRE DE COLONNE
        if (!is_null($this->filter_column)) {
            $query->orderBy($this->filter_column, $this->filter_direction);
        }

        // CHAMP DE RECHERCHE
        if (!empty($this->term)) {
            $query->where(function (Builder $q) {
                $q->whereLike('full_name', '%' . $this->term . '%')
                    ->orWhereLike('email', '%' . $this->term . '%');
            });
        }

        return $query->paginate(12)
            ->withPath(route('admin.messages.index', [
                'selected_filter' => $this->selected_filter,
                'filter_column' => $this->filter_column,
                'filter_direction' => $this->filter_direction,
                'term' => $this->term,
                'locale' => config('app.locale'),
            ]));

    }

    #[Computed]
    public function getUnreadMessageCount(): int
    {
        return Message::where('status', MessageStatus::Unread->value)->count();
    }

    public function markAsRead(Message $message): void
    {
        $this->authorize('update', Message::class);

        if ($message->status !== MessageStatus::Read->value) {
            $message->update(['status' => MessageStatus::Read->value]);
        }
    }

    public function markAsNotRead(int $id): void
    {
        $this->authorize('update', Message::class);

        $message = Message::findOrFail($id);

        $message->update(['status' => MessageStatus::Unread->value]);

        $this->closeModal();
    }

    public function deleteMessage(int $id): void
    {
        $this->authorize('delete', Message::class);

        $message = Message::findOrFail($id);

        $message->delete();

        session()->flash('status', __('admin/messages.delete_message'));

        $this->redirectRoute('admin.messages.index', ['locale' => app()->getLocale()], navigate: true);
    }

    public function openModal(string $modal, int $id): void
    {
        $message = Message::findOrFail($id);

        if ($message->status === MessageStatus::Unread->value) {
            $this->markAsRead($message);
        }

        $this->messageModal = $message;

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
