<form action="" method="post" class="flex flex-col gap-5 w-full">

    {{-- INPUT EMAIL --}}
    <x-forms.fields.input-text
        field_name="email"
        name="email"
        type="email"
        :label="__('admin/login.email')"
        :placeholder="__('admin/login.email_placeholder')"
        :required="true"/>

    {{-- INPUT PASSWORD --}}
    <div class="flex flex-col gap-2">
        <x-forms.fields.input-password
            field_name="password"
            name="password"
            :label="__('admin/login.password')"
            :required="true"/>
        <a href="#" class="text-blue-600 hover:underline self-end">
            {!! __('admin/login.forgot_password') !!}
        </a>
    </div>

    {{-- INPUT SUBMIT --}}
    <x-forms.buttons.outlined-button-submit :label="__('admin/login.btn')"/>
</form>
