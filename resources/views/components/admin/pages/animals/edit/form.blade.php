@props([
    'animal'
])

<section>
    <h2 class="sr-only">
        {!! __('admin/animals.edit_form_title') !!}
    </h2>

    <form wire:submit="save" class="flex flex-col gap-6">

        {{-- FIELDSET ANIMAL --}}
        <x-admin.pages.animals.edit.animal-fieldset
            :animal="$animal"/>

        <x-forms.buttons.normal-button-submit
            :loading_label="__('admin/animals.create_loading_label')"
            class="self-end"
            :label="__('admin/animals.edit_animal_btn')"/>
    </form>
</section>
