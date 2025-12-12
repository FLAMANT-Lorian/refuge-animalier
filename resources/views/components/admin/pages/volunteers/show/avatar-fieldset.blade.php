<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">{!! __('admin/volunteers.fieldset1_legend') !!}</legend>
    <div class="flex flex-row gap-6">
        <div class="single_image_img_container rounded-full h-[7.5rem] w-[7.5rem] bg-gray-100 overflow-hidden">
            <img alt="{!! __('admin/volunteers.avatar_alt') !!}"
                 class="h-full w-full"
                 src="{!! asset('assets/img/avatar.png') !!}">
        </div>
        <div class="flex flex-col items-center md:flex-row gap-4">
            <div class="inline-flex">
                <input class="single_file sr-only" type="file" name="avatar" id="avatar">
                <label for="avatar"
                       class="font-medium w-full text-center px-4 py-2.5 text-white bg-green-500 rounded-lg border border-green-500 hover:bg-transparent hover:text-black transition-all ease-in-out duration-200 hover:cursor-pointer">
                    {!! __('admin/volunteers.choose_an_avatar') !!}
                </label>
            </div>
            <x-forms.buttons.delete
                wire:click="openModal('delete-volunteer-avatar')"
                :label="__('admin/volunteers.delete_avatar')"
            />
        </div>
    </div>
</fieldset>
