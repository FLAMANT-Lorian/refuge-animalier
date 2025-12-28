<form wire:submit="changePassword" class="flex flex-col gap-6">
    <fieldset class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">
        <legend class="sr-only">{!! __('admin/settings.change_password') !!}</legend>

        {{-- ANCIEN MOT DE PASSE --}}
        <x-forms.fields.input-password
            wire="changePasswordForm.old_password"
            field_name="old_password"
            name="old_password"
            :label="__('admin/settings.old_password')"
            :required="true"
        />

        {{-- NOUVEAU MOT DE PASSE --}}
        <x-forms.fields.input-password
            wire="changePasswordForm.new_password"
            field_name="new_password"
            name="new_password"
            :label="__('admin/settings.new_password')"
            required="true"
        />

    </fieldset>
    {{-- BOUTON DE SOUMISSION --}}
    <x-forms.buttons.normal-button-submit
        :loading_label="__('admin/animals.create_loading_label')"
        class="self-start"
        :label="__('admin/settings.change_password')"/>
</form>
