@php
    use App\Enums\AnimalStatus;
    use App\Enums\VolunteerStatus;
    use App\Enums\AdoptionRequestsStatus;
@endphp
<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-medium">{{ __('admin/adoption-requests.fieldset_title') }}</legend>
    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- NOM --}}
        <x-forms.fields.input-text
            field_name="name"
            name="name"
            :label="__('admin/adoption-requests.full_name')"
            :placeholder="__('admin/adoption-requests.full_name_placeholder')"
            :required="true"
        />

        {{-- EMAIL --}}
        <x-forms.fields.input-text
            field_name="sex"
            name="sex"
            type="email"
            :label="__('admin/adoption-requests.email')"
            :placeholder="__('admin/adoption-requests.email_placeholder')"
            :required="true"
        />

        {{-- PHONE --}}
        <x-forms.fields.input-text
            field_name="phone"
            name="phone"
            :label="__('admin/adoption-requests.phone')"
            :placeholder="__('admin/adoption-requests.phone_placeholder')"
            :required="true"
        />

        {{-- ADRESSE --}}
        <x-forms.fields.input-text
            field_name="address"
            name="address"
            :label="__('admin/adoption-requests.address')"
            :placeholder="__('admin/adoption-requests.address_placeholder')"
        />

        {{-- MESSAGE --}}
        <x-forms.fields.textarea
            class="md:col-start-2 md:col-end-3 md:row-start-3 md:row-end-5 lg:col-start-3 lg:col-end-4 lg:row-start-2 lg:row-end-4"
            field_name="message"
            name="message"
            :label="__('admin/adoption-requests.message')"
            :placeholder="__('admin/adoption-requests.message_placeholder')"
            :required="true"
        />

        {{-- CODE POSTAL --}}
        <x-forms.fields.input-text
            field_name="postal_code"
            name="postal_code"
            type="number"
            :label="__('admin/adoption-requests.postal_code')"
            :placeholder="__('admin/adoption-requests.postal_code_placeholder')"
            min_number="0"
        />

        {{-- STATUS --}}
        <x-forms.fields.select
            field_name="animal"
            :label="__('admin/adoption-requests.status')"
            name="status"
            :collection="AdoptionRequestsStatus::cases()"
            required="true"
            identifier="value"
            :value="AdoptionRequestsStatus::Awaiting->value"
        />

        {{-- ANIMAL --}}
        <x-forms.fields.select-animal
            field_name="animal"
            :label="__('admin/adoption-requests.animal')"
            name="animal"
            :collection="$this->animals"
            required="true"
        />

    </div>
</fieldset>
