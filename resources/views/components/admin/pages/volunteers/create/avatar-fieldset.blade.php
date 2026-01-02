<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">{!! __('admin/volunteers.fieldset1_legend') !!}</legend>
    <div class="flex flex-row gap-6">
        @if($avatar = $this->volunteerForm->avatar)
            <div class="single_image_img_container rounded-full h-30 w-30 bg-gray-100 overflow-hidden">
                <img alt="{!! __('admin/volunteers.avatar_alt') !!}"
                     class="h-full w-full"
                     src="{{ $avatar->temporaryUrl() }}">
            </div>
        @else
            <div class="rounded-full h-30 w-30 p-4 bg-gray-100">
                <img alt="{!! __('admin/settings.avatar_alt') !!}"
                     src="{!! Storage::disk('s3')->url('base/default-avatar.svg') !!}">
            </div>
        @endif
        <div class="flex flex-col items-center md:flex-row gap-4">
            <div class="inline-flex">
                <input wire:model="volunteerForm.avatar" class="single_file sr-only" type="file" name="avatar"
                       id="avatar" accept="image/jpeg, image/png, image/gif, image/webp">
                <label for="avatar"
                       class="font-normal w-full text-center px-4 py-2.5 text-white bg-green-500 rounded-lg border border-green-500 hover:bg-transparent hover:text-black transition-all ease-in-out duration-200 hover:cursor-pointer">
                    {!! __('admin/volunteers.choose_an_avatar') !!}
                </label>
            </div>
            @if($this->volunteerForm->avatar)
                <x-forms.buttons.delete
                    wire:click="openModal('delete-volunteer-avatar')"
                    :label="__('admin/volunteers.delete_avatar')"
                />
            @endif
        </div>
        @error('volunteerForm.avatar')
            <span>{{ $message }}</span>
        @enderror
    </div>
</fieldset>
