<fieldset class="pt-6 border-t border-t-gray-200 flex flex-col gap-4">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-medium">{!! __('admin/animals.create_fieldset2_title') !!}</legend>
        <p class="text-base text-gray-500">{!! __('admin/animals.create_fieldset2_sub_title') !!}</p>
    </div>
    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- NOM DE L’ADOPTANT--}}
        <x-forms.fields.input-text
            field_name="name"
            name="adopter_name"
            :label="__('admin/animals.create_volunteer_name')"
            value=""
            :placeholder="__('admin/animals.create_volunteer_name_placeholder')"
            :required="true"
        />

        {{-- EMAIL DE L’ADOPTANT--}}
        <x-forms.fields.input-text
            field_name="email"
            name="adopter_email"
            :label="__('admin/animals.create_volunteer_email')"
            :placeholder="__('admin/animals.create_volunteer_email_placeholder')"
            :required="true"
        />

        {{-- ADRESSE DE L’ADOPTANT --}}
        <x-forms.fields.input-text
            field_name="address"
            name="adopter_address"
            :label="__('admin/animals.create_volunteer_location')"
            :placeholder="__('admin/animals.create_volunteer_location_placeholder')"
            :required="true"
        />

        {{-- CODE POSTAL DE L’ADOPTANT --}}
        <x-forms.fields.input-number
            field_name="postal_code"
            name="adopter_postal_code"
            :label="__('admin/animals.create_volunteer_postal_code')"
            :placeholder="__('admin/animals.create_volunteer_postal_code')"
            :required="true"
            min_number="0"
        />

        {{-- HEURE DE DÉPART DE L’ANIMAL--}}
        <x-forms.fields.input-text
            field_name="departure_hour"
            type="time"
            name="adopter_departure_hour"
            :label="__('admin/animals.create_volunteer_departure_hour')"
            :placeholder="__('admin/animals.create_volunteer_departure_hour_placeholder')"
            :required="true"
        />

        {{-- DATE DE DÉPART DE L’ANIMAL--}}
        <x-forms.fields.input-text
            field_name="departure_date"
            type="date"
            name="adopter_departure_date"
            :label="__('admin/animals.create_volunteer_departure_date')"
            :placeholder="__('admin/animals.create_volunteer_departure_date_placeholder')"
            :required="true"
        />

    </div>

</fieldset>
