<form wire:submit="save" class="flex flex-col gap-10">

    {{-- AVATAR --}}
    <x-admin.pages.settings.base-form.avatar-fieldset/>

    {{-- INFORMATIONS DE L'UTILISATEUR --}}
    <x-admin.pages.settings.base-form.username-info-fieldset/>

    {{-- DISPONIBILITÉ --}}
    <x-admin.pages.volunteers.show.fieldset-availability/>

    {{-- NOTIFICATIONS --}}
    @if(auth()->user()->isAdmin())
        <x-admin.pages.settings.base-form.notifications-fieldset/>
    @endif
    {{-- BOUTON DE SOUMISSION --}}
    <x-forms.buttons.normal-button-submit
        :loading_label="__('admin/animals.create_loading_label')"
        class="self-start"
        :label="__('admin/settings.save_change')"/>
</form>
