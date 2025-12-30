<?php

use App\Enums\AdoptionRequestsStatus;
use App\Enums\MessageStatus;
use App\Enums\SheetsStatus;
use App\Models\AdoptionRequest;
use App\Models\AnimalSheet;
use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    #[Computed]
    public function getUnreadMessageCount(): int
    {
        return Message::where('status', MessageStatus::Unread->value)->count();
    }

    #[Computed]
    public function getAdoptionRequestsCount(): int
    {
        return AdoptionRequest::where('status', AdoptionRequestsStatus::Awaiting->value)->count();
    }

    #[Computed]
    public function getAnimalSheetCount(): int
    {
        return AnimalSheet::whereIn('status', [SheetsStatus::Creation->value, SheetsStatus::Modification->value])->count();
    }
};
?>

<header class="lg:sticky lg:h-screen top-0 px-6 pt-10 lg:pt-0 md:px-12 lg:px-0">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a wire:navigate class="sr-only" href="#content" title="{!! __('admin/navigation.go_to_main_content') !!}">
        {!! __('admin/navigation.go_to_main_content') !!}
    </a>

    {{----------------------------}}
    {{-----Menu de navigation-----}}
    {{----------------------------}}
    <nav aria-label="Navigation principale"
         class="lg:overflow-auto lg:w-[18.75rem] flex lg:flex-col lg:h-full px-6 py-4 lg:py-10 items-center justify-between lg:justify-start bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">{!! __('admin/navigation.main_nav') !!}</h2>
        <a wire:navigate class="relative z-50 block max-w-[13.75rem] w-full hover:translate-x-1 transition-all"
           href="{!! route('admin.dashboard') !!}" title="{!! __('admin/navigation.go_to_dashboard') !!}"> <img
                class="w-full h-auto" src="{!! asset('assets/img/svg/logo/logo_small.svg') !!}"
                alt="{!! __('public/header.logo_alt') !!}"> </a>

        <x-admin.navigation.burger-menu-cross-admin/>


        <x-admin.navigation.navigation-bar/>
    </nav>
</header>
