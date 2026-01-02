<x-admin.partials.login-layout>
    <main
        class="h-screen login max-md:flex max-md:justify-center max-md:items-center md:grid md:grid-cols-10 lg:grid-cols-[repeat(13,minmax(0,1fr))] md:gap-6 md:pr-12 lg:pr-18">
        <h1 class="sr-only">Page de connexion à l’administration</h1>
        <figure class="h-screen max-md:hidden md:col-start-1 md:col-end-6 lg:col-end-8">
            <img class="h-full" src="{!! Storage::disk('s3')->url('base/bg-image-login.jpg') !!}"
                 alt="{!! __('admin/login.img_alt') !!}">
        </figure>
        <section
            class="px-6 md:px-0 flex flex-col gap-6 justify-center items-center md:col-start-6 lg:col-start-9 md:col-end-11 lg:col-end-13">
            <h2 class="sr-only">Formulaire de connexion</h2>
            <figure class="max-md:hidden flex">
                <img src="{!! Storage::disk('s3')->url('base/svg/logo/logo_normal.svg') !!}"
                     alt="{!! __('public/header.logo_alt') !!}">
            </figure>
            <figure class="max-md:flex hidden">
                <img src="{!! Storage::disk('s3')->url('base/svg/logo/logo_small.svg')  !!}"
                     alt="{!! __('public/header.logo_alt') !!}">
            </figure>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl font-normal text-center">
                    {!! __('admin/login.title') !!}
                </h3>
                <p class="text-gray-500 text-base font-normal text-center">
                    {!! __('forms.field_with') !!}<strong class="text-red">*</strong>
                    {!! __('forms.are_required') !!}
                </p>
            </div>
            <x-admin.pages.auth.login-form/>
        </section>
    </main>
</x-admin.partials.login-layout>
