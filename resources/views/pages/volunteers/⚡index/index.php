<?php

use App\Enums\MessageStatus;
use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Models\User;
use App\Traits\HandleAvatar;
use App\Traits\IndexFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('admin/page_title.volunteers')]
class extends Component {

    use WithPagination;
    use HandleAvatar;
    use IndexFilter;

    public string $app_title;

    public bool $openDeleteVolunteer = false;
    public User $volunteerToDelete;

    #[Url]
    public string $selected_filter = 'all';
    #[Url]
    public string $term = '';

    public function mount(): void
    {
        $this->authorize('view', User::class);

        $this->app_title = __('admin/volunteers.title');
    }

    public function deleteVolunteer(int $id): void
    {
        $volunteer = User::findOrFail($id);

        $this->authorize('delete', User::class);

        if ($volunteer->avatar_path) {
            $this->deleteAvatar($volunteer->avatar_path, $volunteer);
        }

        $volunteer->delete();

        session()->flash('status', __('admin/volunteers.delete_flash_message'));

        $this->redirectRoute('admin.volunteers.index', ['locale' => app()->getLocale()], navigate: true);
    }

    #[Computed]
    public function volunteers()
    {
        $query = User::where('role', UserStatus::Volunteer);

        $array_of_states = array_map(
            fn(VolunteerStatus $status) => $status->value,
            VolunteerStatus::cases()
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
                $q->whereLike('last_name', '%' . $this->term . '%')
                    ->orWhereLike('first_name', '%' . $this->term . '%')
                    ->orWhereLike('email', '%' . $this->term . '%');
            });
        }

        return $query->paginate(12)
            ->withPath(route('admin.volunteers.index', [
                'selected_filter' => $this->selected_filter,
                'filter_column' => $this->filter_column,
                'filter_direction' => $this->filter_direction,
                'term' => $this->term,
                'locale' => config('app.locale'),
            ]));

    }

    #[Computed]
    public function getVolunteerCount(): int
    {
        return User::where('role', UserStatus::Volunteer->value)->count();
    }

    public function openModal(string $modal, int $id): void
    {
        $volunteer = User::findOrFail($id);

        if ($modal === 'delete-volunteer') {
            $this->openDeleteVolunteer = true;
            $this->volunteerToDelete = $volunteer;
        }

        $this->dispatch('open-modal');
    }

    public function closeModal(): void
    {
        $this->openDeleteVolunteer = false;
        $this->dispatch('close-modal');
    }
};
