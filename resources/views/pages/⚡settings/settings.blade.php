@php
    use App\Enums\AvailableLanguage;
@endphp
<main class="settings flex-1 px-6 py-12 md:px-12 lg:px-16 lg:py-10 flex flex-col gap-6" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <section class="flex max-[600px]:flex-col gap-4 justify-between items-start">
            <div class="flex flex-col gap-4">
                {{-- FIL D'ARIANE --}}
                <a title="{!! __('admin/settings.breadcrumb_title') !!}"
                   wire:navigate href="{!! route('admin.settings', config('app.locale')) !!}"
                   class="self-start font-bold text-gray-500">
                    – {!! $app_title !!}
                </a>

                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl font-bold">{!! __('admin/settings.title') !!}</h2>
                    <p class="text-base text-gray-500">
                        {!! __('forms.field_with') !!}<strong
                            class="text-red">*</strong> {!! __('forms.are_required') !!}
                    </p>
                </div>
            </div>
            <div class="flex flex-row gap-2 items-center">
                <p>{{ __('admin/settings.change_locale') }}</p>
                <form>
                    <label class="sr-only">Sélécteur de langue</label> <select
                        class="hover:cursor-pointer select_form pl-2 pr-7 py-2.5 border border-green-500 rounded-lg font-medium"
                        wire:model.live="locale">
                        @foreach(AvailableLanguage::cases() as $locale)
                            <option value="{{ $locale->value }}">{{ __('enum.' . $locale->value) }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </section>

        {{-- FORMULAIRE --}}
        <x-admin.pages.settings.base-section/>

    </div>

    {{-- FORMULAIRE DE CHANGEMENT DE MOT DE PASSE--}}
    <div class="flex flex-col gap-10 bg-white border border-gray-200 rounded-2xl p-6">
        <x-admin.pages.settings.change-password-section/>
    </div>

    @if($openDeleteAvatar)
        <x-admin.modals.settings.delete-avatar/>
    @endif
</main>
