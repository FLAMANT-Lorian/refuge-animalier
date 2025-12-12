<fieldset class="flex flex-col gap-4 pt-6 border-t border-t-gray-200">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-semibold">{!! __('admin/volunteers.password') !!}</legend>
        <p>{!! __('admin/volunteers.ten_min') !!}</p>
    </div>
    <div class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">

        {{-- MOT DE PASSE --}}
        <x-forms.fields.input-password
            name="password"
            field_name="password"
            :label="__('admin/volunteers.password')"
            :required="true"
        />

    </div>
</fieldset>
