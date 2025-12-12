<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">{!! __('admin/settings.fieldset1') !!}</legend>
    <div class="flex flex-row gap-6">
        <img alt="{!! __('admin/settings.avatar_alt') !!}"
             class="rounded-full h-[7.5rem] w-[7.5rem] bg-gray-100"
             src="{!! asset('assets/img/avatar.png') !!}">
        <div class="flex flex-col items-center md:flex-row gap-4">
            <div class="inline-flex">
                <input class="sr-only" type="file" name="avatar" id="avatar">
                <label for="avatar"
                       class="w-full text-center px-4 py-2.5 text-white bg-green-500 rounded-lg border border-green-500 hover:bg-transparent hover:text-black transition-all ease-in-out duration-200 hover:cursor-pointer">
                    {!! __('admin/settings.choose_an_avatar') !!}
                </label>
            </div>
            <x-forms.buttons.delete
                :label="__('admin/settings.delete_avatar')"
                wire:click="openModal('delete-user-avatar')"
            />
        </div>
    </div>
</fieldset>
