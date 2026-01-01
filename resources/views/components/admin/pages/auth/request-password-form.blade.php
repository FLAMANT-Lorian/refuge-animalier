<form action="{!! route('password.email') !!}" novalidate method="post" class="flex flex-col gap-5 w-full">
    @csrf
    {{-- INPUT EMAIL --}}
    <x-forms.fields.input-text
        field_name="email"
        name="email"
        type="email"
        :label="__('admin/login.email')"
        :placeholder="__('admin/login.email_placeholder')"
        :required="true"/>

    {{-- INPUT SUBMIT --}}
    <x-forms.buttons.outlined-button-submit :label="__('admin/login.request_password_btn')"/>
</form>
