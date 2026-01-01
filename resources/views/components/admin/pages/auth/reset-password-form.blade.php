<form action="{!! route('password.update') !!}" novalidate method="post" class="flex flex-col gap-5 w-full">
    @csrf
    {{-- INPUT EMAIL --}}
    <x-forms.fields.input-text field_name="email" name="email" type="email" :label="__('admin/login.email')"
                               :placeholder="__('admin/login.email_placeholder')" :required="true"/>

    <x-forms.fields.input-password field_name="password" name="password"
                                   :label="__('admin/login.reset_password_label1')" :required="true"/>

    <x-forms.fields.input-password field_name="password_confirmation" name="password_confirmation"
                                   :label="__('admin/login.reset_password_label2')" :required="true"/>

    <input type="hidden" name="token" value="{{ request()->route('token') }}">

    {{-- INPUT SUBMIT --}}
    <x-forms.buttons.outlined-button-submit :label="__('admin/login.reset_password_btn')"/>
</form>
