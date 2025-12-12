<fieldset class="flex flex-col gap-4">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-semibold">{!! __('admin/settings.fieldset3') !!}</legend>
        <p class="text-base font-normal text-gray-500">
            {!! __('admin/settings.fieldset3_legend') !!}
        </p>
    </div>
    <div class="flex flex-col gap-2">

        <x-forms.fields.input-checkbox
            field_name="adoptions_requests"
            name="notifications[adoption_requests]"
            :label="__('admin/settings.option1')"/>

        <x-forms.fields.input-checkbox
            field_name="animal_sheets"
            name="notifications[animal_sheets]"
            :label="__('admin/settings.option2')"/>

        <x-forms.fields.input-checkbox
            field_name="messages"
            name="notifications[messages]"
            :label="__('admin/settings.option3')"/>

        <x-forms.fields.input-checkbox
            field_name="activity_report"
            name="notifications[activity_report]"
            :label="__('admin/settings.option4')"/>

    </div>
</fieldset>
