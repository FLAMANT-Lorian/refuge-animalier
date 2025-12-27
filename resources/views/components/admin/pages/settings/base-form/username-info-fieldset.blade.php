<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">{!! __('admin/settings.fieldset2') !!}</legend>
    <div class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">

        {{-- Nom de famille --}}
        <x-forms.fields.input-text
            wire="form.last_name"
            field_name="last_name"
            name="last_name"
            :label="__('admin/settings.lastname')"
            :placeholder="__('admin/settings.lastname_placeholder')"
            required="true"
        />

        {{-- Prénom --}}
        <x-forms.fields.input-text
            wire="form.first_name"
            field_name="first_name"
            name="first_name"
            :label="__('admin/settings.firstname')"
            :placeholder="__('admin/settings.firstname_placeholder')"
            required="true"
        />

        {{-- EMAIL --}}
        <x-forms.fields.input-text
            wire="form.email"
            type="email"
            field_name="email"
            name="email"
            :label="__('admin/settings.email')"
            :placeholder="__('admin/settings.email_placeholder')"
            :required="true"
        />

        {{-- CODE POSTAL --}}
        <x-forms.fields.input-number
            wire="form.postal_code"
            field_name="postal_code"
            name="postal_code"
            :label="__('admin/settings.postal_code')"
            min_number="0"
            :placeholder="__('admin/settings.postal_code_placeholder')"
        />

        {{-- ADRESSE --}}
        <x-forms.fields.input-text
            wire="form.address"
            field_name="address"
            name="address"
            :label="__('admin/settings.location')"
            :placeholder="__('admin/settings.location_placeholder')"
        />
    </div>
</fieldset>
