@props([
    'animal'
])

<section>
    <h2 class="sr-only">
        {!! __('admin/animals.edit_form_title') !!}
    </h2>

    <form action="" method="post" class="flex flex-col gap-6">

        {{-- FIELDSET ANIMAL --}}
        <x-admin.pages.animals.edit.animal-fieldset
            :animal="$this->animal"/>

        {{-- FIELDSET ADOPTANT --}}
        <x-admin.pages.animals.edit.adopter-fieldset/>

        <x-forms.buttons.normal-button-submit
            class="self-end"
            :label="__('admin/animals.edit_animal_btn')"/>
    </form>
</section>
