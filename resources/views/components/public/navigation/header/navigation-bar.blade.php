<div class="nav__container--public">
    <x-public.navigation.header.navigation-links/>

    <div class="flex flex-col gap-1 border-t border-t-gray-100 pt-4 mt-auto md:hidden">
        <a href="{!! route('public.homepage') !!}" title="{!! __('public/header.homepage_link_title') !!}">
            <img src="{!! Storage::disk('s3')->url('base/svg/logo/logo_small.svg')  !!}" class="self-start fill-white"
                 alt="{!! __('public/header.logo_alt') !!}">
        </a>
        <p class="text-sm font-normal text-black">{!! __('public/header.copyright') !!}</p>
    </div>
</div>
