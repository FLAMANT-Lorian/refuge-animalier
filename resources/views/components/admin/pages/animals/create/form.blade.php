<section>
    <h2 class="sr-only">
        {!! __('admin/animals.create_title') !!}
    </h2>

    <form action="" method="post" class="flex flex-col gap-6">

        {{-- FIELDSET ANIMAL --}}
        <x-admin.pages.animals.create.animal-fieldset/>

        <x-forms.buttons.normal-button-submit
            class="self-end"
            :label="__('admin/animals.create_animal_btn')"/>
    </form>
</section>
