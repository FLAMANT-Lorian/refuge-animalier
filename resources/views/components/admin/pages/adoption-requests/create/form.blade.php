<section>
    <h2 class="sr-only">
        {!! __('admin/animals.create_title') !!}
    </h2>

    <form class="flex flex-col gap-6">

        {{-- FIELDSET BASE INFORMATIONS --}}
        <x-admin.pages.adoption-requests.create.base-fieldset/>

        {{-- FIELDSET ENVIRONMENT INFORMATION --}}
        <x-admin.pages.adoption-requests.create.environment-fieldset/>

        <x-forms.buttons.normal-button-submit
            class="self-end"
            :label="__('admin/adoption-requests.edit_btn')"/>
    </form>
</section>
