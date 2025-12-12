<fieldset class="flex flex-col gap-4 pt-6 border-t border-t-gray-200">
    <legend class="contents text-lg font-semibold">{!! __('admin/volunteers.fieldset3_legend') !!}</legend>
    <div class="grid grid-cols-2 md:grid-cols-3 min-[68.75rem]:grid-cols-7 gap-6">

        {{-- LUNDI --}}
        <x-forms.fields.input-text
            field_name="monday"
            name="monday"
            :label="__('admin/volunteers.monday')"
            :placeholder="__('admin/volunteers.monday_placeholder')"
        />

        {{-- MARDI --}}
        <x-forms.fields.input-text
            field_name="tuesday"
            name="tuesday"
            :label="__('admin/volunteers.tuesday')"
            :placeholder="__('admin/volunteers.tuesday_placeholder')"
        />

        {{-- MERCREDI --}}
        <x-forms.fields.input-text
            field_name="wednesday"
            name="wednesday"
            :label="__('admin/volunteers.wednesday')"
            :placeholder="__('admin/volunteers.wednesday_placeholder')"
        />

        {{-- JEUDI --}}
        <x-forms.fields.input-text
            field_name="thursday"
            name="thursday"
            :label="__('admin/volunteers.thursday')"
            :placeholder="__('admin/volunteers.thursday_placeholder')"
        />

        {{-- VENDREDI --}}
        <x-forms.fields.input-text
            field_name="friday"
            name="friday"
            :label="__('admin/volunteers.friday')"
            :placeholder="__('admin/volunteers.friday_placeholder')"
        />

        {{-- SAMEDI --}}
        <x-forms.fields.input-text
            field_name="saturday"
            name="saturday"
            :label="__('admin/volunteers.saturday')"
            :placeholder="__('admin/volunteers.saturday_placeholder')"
        />

        {{-- DIMANCHE --}}
        <x-forms.fields.input-text
            field_name="sunday"
            name="sunday"
            :label="__('admin/volunteers.sunday')"
            :placeholder="__('admin/volunteers.sunday_placeholder')"
        />

    </div>
</fieldset>
