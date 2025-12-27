<section>
    <h2 class="sr-only">
        {!! __('admin/animals.create_title') !!}
    </h2>

    <form wire:submit="save" class="flex flex-col gap-6">

        {{-- FIELDSET BASE INFORMATIONS --}}
        <x-admin.pages.adoption-requests.edit.base-fieldset/>

        {{-- FIELDSET ENVIRONMENT INFORMATION --}}
        <x-admin.pages.adoption-requests.edit.environment-fieldset/>

        <x-forms.buttons.normal-button-submit
            :loading_label="__('admin/animals.create_loading_label')"
            class="self-end"
            :label="__('admin/adoption-requests.edit_btn')"/>
    </form>
</section>
