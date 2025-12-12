<main
    class="h-screen login max-md:flex max-md:justify-center max-md:items-center md:grid md:grid-cols-10 lg:grid-cols-[repeat(13,minmax(0,1fr))] md:gap-6 md:pr-12 lg:pr-18">
    <figure class="h-screen max-md:hidden md:col-start-1 md:col-end-6 lg:col-end-8">
        <img class="h-full" src="{!! asset("assets/img/bg-image-login.jpg") !!}"
             alt="{!! __('admin/login.img_alt') !!}">
    </figure>
    <section
        class="px-6 md:px-0 flex flex-col gap-6 justify-center items-center md:col-start-6 lg:col-start-9 md:col-end-11 lg:col-end-13">
        <figure class="max-md:hidden flex">
            <img src="{!! asset("assets/img/svg/logo/logo_normal.svg") !!}" alt="{!! __('public/header.logo_alt') !!}">
        </figure>
        <figure class="max-md:flex hidden">
            <img src="{!! asset("assets/img/svg/logo/logo_small.svg") !!}" alt="{!! __('public/header.logo_alt') !!}">
        </figure>
        <div class="flex flex-col gap-2">
            <h2 class="text-xl font-normal text-center">
                {!! __('admin/login.title') !!}
            </h2>
            <p class="text-base font-normal text-center">
                {!! __('forms.field_with') !!}<strong class="text-red">*</strong>
                {!! __('forms.are_required') !!}
            </p>
        </div>
        <x-admin.pages.login.login-form/>
    </section>
</main>
