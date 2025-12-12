<section class="flex flex-col gap-4">
    <div>
        <h2 class="text-lg font-semibold">{!! __('admin/settings.change_password') !!}</h2>
        <p class="text-base text-gray-500">{!! __('admin/settings.change_password_text') !!}</p>
    </div>

    {{-- FORMULAIRE --}}
    <x-admin.pages.settings.change-password-form/>
</section>
