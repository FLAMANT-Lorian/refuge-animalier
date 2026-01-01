@php
    use App\Models\Message;
    use App\Models\AdoptionRequest;
    use App\Models\AnimalSheet;
    use App\Models\User;
@endphp

<ul class="flex flex-col gap-6 lg:gap-4 mt-12 lg:mt-20 mb-auto">

    <li class="group">
        <x-admin.navigation.navigation-link
            :destination="route('admin.dashboard', ['locale' => app()->getLocale()])"
            icon="dashboard"
            class="lg:group-hover:text-white"
            :title="__('admin/navigation.dashboard_title')">
            {{ __('admin/navigation.dashboard') }}
        </x-admin.navigation.navigation-link>
    </li>

    <li class="group">
        <x-admin.navigation.navigation-link
            :destination="route('admin.animals.index', ['locale' => app()->getLocale()])"
            icon="animals"
            class="lg:group-hover:text-white"
            :title="__('admin/navigation.animals_title')">
            {{ __('admin/navigation.animals') }}
        </x-admin.navigation.navigation-link>
    </li>

    @can('view-any', AdoptionRequest::class)
        <li class="group">
            <x-admin.navigation.navigation-link
                :count="$this->getAdoptionRequestsCount"
                :destination="route('admin.adoption-requests.index', ['locale' => app()->getLocale()])"
                icon="adoption-requests"
                class="lg:group-hover:text-white"
                :title="__('admin/navigation.adoption-requests_title')">
                {{ __('admin/navigation.adoption-requests') }}
            </x-admin.navigation.navigation-link>
        </li>
    @endcan

    @can('view-any', AnimalSheet::class)

        <li class="group">
            <x-admin.navigation.navigation-link
                :count="$this->getAnimalSheetCount"
                :destination="route('admin.animal-sheets.index', ['locale' => app()->getLocale()])"
                icon="animal-sheets"
                class="lg:group-hover:text-white"
                :title="__('admin/navigation.animal-sheets_title')">
                {{ __('admin/navigation.animal-sheets') }}
            </x-admin.navigation.navigation-link>
        </li>

    @endcan

    @can('view-any', Message::class)

        <li class="group">
            <x-admin.navigation.navigation-link
                :count="$this->getUnreadMessageCount"
                :destination="route('admin.messages.index', ['locale' => app()->getLocale()])"
                icon="messages"
                class="lg:group-hover:text-white"
                :title="__('admin/navigation.messages_title')">
                {{ __('admin/navigation.messages') }}
            </x-admin.navigation.navigation-link>
        </li>

    @endcan

    @can('view-any', User::class)

        <li class="group">
            <x-admin.navigation.navigation-link
                :destination="route('admin.volunteers.index', ['locale' => app()->getLocale()])"
                icon="volunteers"
                class="lg:group-hover:text-white"
                :title="__('admin/navigation.volunteers_title')">
                {{ __('admin/navigation.volunteers') }}
            </x-admin.navigation.navigation-link>
        </li>

    @endcan
</ul>
