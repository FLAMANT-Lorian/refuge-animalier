<x-admin.partials.login-layout>
    <main
        class="h-screen login max-md:flex max-md:justify-center max-md:items-center md:grid md:grid-cols-10 lg:grid-cols-[repeat(13,minmax(0,1fr))] md:gap-6 md:pr-12 lg:pr-18">
        <figure class="h-screen max-md:hidden md:col-start-1 md:col-end-6 lg:col-end-8">
            <img class="h-full" src="{!! Storage::disk('s3')->url('base/bg-image-login.jpg') !!}"
                 alt="{!! __('admin/login.img_alt') !!}">
        </figure>
        <section
            class="px-6 md:px-0 flex flex-col gap-6 justify-center items-center md:col-start-6 lg:col-start-9 md:col-end-11 lg:col-end-13">
            <figure class="max-md:hidden flex">
                <img src="{!! Storage::disk('s3')->url('base/svg/logo/logo_normal.svg') !!}"
                     alt="{!! __('public/header.logo_alt') !!}">
            </figure>
            <figure class="max-md:flex hidden">
                <img src="{!! Storage::disk('s3')->url('base/svg/logo/logo_small.svg')  !!}"
                     alt="{!! __('public/header.logo_alt') !!}">
            </figure>
            <div class="flex flex-col gap-2">
                <h2 class="text-xl font-normal text-center">
                    {!! __('admin/login.request_password_title') !!}
                </h2>
                <p class="text-gray-500 text-base font-normal text-center">
                    {{ __('admin/login.request_password_subtitle') }}
                </p>
            </div>
            <x-admin.pages.auth.request-password-form/>
            <a title="{{ __('admin/login.back_to_login_title') }}"
               class="hover:font-bold cursor-pointer trans-all flex flex-row gap-2 items-center"
               href="{{ route('login') }}">
                <svg width="17" height="8" viewBox="0 0 17 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.146447 3.32833C-0.0488153 3.52359 -0.0488153 3.84018 0.146447 4.03544L3.32843 7.21742C3.52369 7.41268 3.84027 7.41268 4.03553 7.21742C4.2308 7.02216 4.2308 6.70557 4.03553 6.51031L1.20711 3.68189L4.03553 0.853458C4.2308 0.658196 4.2308 0.341613 4.03553 0.146351C3.84027 -0.0489109 3.52369 -0.0489109 3.32843 0.146351L0.146447 3.32833ZM16.5 3.68189V3.18189H0.5L0.5 3.68189L0.5 4.18189H16.5V3.68189Z"
                        fill="#292A2B"/>
                </svg>
                {{ __('admin/login.back_to_login') }}
            </a>
        </section>
    </main>
</x-admin.partials.login-layout>
