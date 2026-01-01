<form class="p-6 flex flex-col gap-8 bg-white border border-gray-200 rounded-2xl"
      action="{{ route('public.contact.store', ['locale' => app()->getLocale()]) }}"
      method="post"
      novalidate>
    @csrf

    <fieldset class="flex flex-col gap-6 md:grid md:grid-cols-10">
        <legend class="sr-only">{!! __('public/contact.contact_form_legend') !!}</legend>

        <x-forms.fields.input-text
            class="md:col-start-1 md:col-end-6"
            field_name="full_name"
            name="full_name"
            :label="__('forms.full_name')"
            placeholder="Doe"
        />

        {{-- ADRESSE E-MAIL --}}
        <x-forms.fields.input-text
            class="md:col-start-6 md:col-end-11"
            type="email"
            field_name="email"
            name="email"
            :label="__('forms.email')"
            placeholder="johndoe@example.be"
            :required="true"
        />

        {{-- OBJET --}}
        <x-forms.fields.input-text
            class="md:col-start-1 md:col-end-11"
            type="object"
            field_name="object"
            name="object"
            :label="__('forms.object')"
            :placeholder="__('forms.object_placeholder')"
            :required="true"
        />

        {{-- COMMUNICATION --}}
        <x-forms.fields.textarea
            extra_class="min-h-[15rem]"
            class="md:col-start-1 md:col-end-11"
            field_name="message"
            name="message"
            :label="__('forms.communication')"
            :placeholder="__('forms.communication_placeholder')"
            :required="true"
        />

    </fieldset>
    <x-forms.buttons.outlined-button-submit :label="__('forms.send')"/>
</form>
