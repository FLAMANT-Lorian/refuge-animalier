@php
    use App\Models\Animal;
    use App\Models\AnimalSheet;
    use App\Models\User;
@endphp
<section {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <h3 class="text-lg font-semibold">
        {!! __('admin/dashboard.fast_actions_big_title') !!}
    </h3>
    <div class="flex md:grid flex-col md:grid-cols-2 lg:flex lg:flex-col gap-6">

        @can('create', Animal::class)
            {{-- CRÉER UN ANIMAL --}}
            <x-admin.pages.dashboard.action-card
                :title="__('admin/dashboard.fast_actions1_title')"
                :subtitle="__('admin/dashboard.fast_actions1_subtitle')"
                :img_path="asset('assets/img/svg/dashboard/dog.svg')"
                :img_alt="__('admin/dashboard.fast_actions1_')"
                :destination="route('admin.animals.create', config('app.locale'))"
                :destination_title="__('admin/dashboard.fast_actions1_destination_title')"
            />
        @endcan

        @can('create', User::class)
            {{-- CRÉER UN BÉNÉVOLE --}}
            <x-admin.pages.dashboard.action-card
                :title="__('admin/dashboard.fast_actions2_title')"
                :subtitle="__('admin/dashboard.fast_actions2_subtitle')"
                :img_path="asset('assets/img/svg/dashboard/children.svg')"
                :img_alt="__('admin/dashboard.fast_actions2_alt')"
                :destination="route('admin.volunteers.create', config('app.locale'))"
                :destination_title="__('admin/dashboard.fast_actions2_destination_title')"
            />
        @endcan

        @can('create', AnimalSheet::class)
            {{-- CRÉER UN BÉNÉVOLE --}}
            <x-admin.pages.dashboard.action-card
                :title="__('admin/dashboard.fast_actions3_title')"
                :subtitle="__('admin/dashboard.fast_actions3_subtitle')"
                :img_path="asset('assets/img/svg/dashboard/dog.svg')"
                :img_alt="__('admin/dashboard.fast_actions3_alt')"
                :destination="route('admin.animals.index', config('app.locale'))"
                :destination_title="__('admin/dashboard.fast_actions3_destination_title')"
                />
        @endcan
    </div>
</section>
